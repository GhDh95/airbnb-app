<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Image;
use App\Models\Listing;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use OpenCage\Geocoder\Geocoder;

class ListingController extends Controller
{
    //

    /**
     * @throws Exception
     */
    public function index(): Response
    {
        $filters = request()->input();
        $addresses = Address::all();

        $transformed = [];
        foreach ($addresses as $address){
            $string = $address->streetname . " " . $address->house_number . " " . $address->zip . " " . $address->city . " " . $address->country;
                $transformed[] = $string;
        }
        $geocoder = new Geocoder('a02143abc3884803b13de230ec9685c3');

        $result = [];
        foreach ($transformed as $val){
            $result [] = $geocoder->geocode($val)['results'][0]['geometry'];
        }





        return Inertia::render('Welcome',[
            'listings' => Listing::query()->latest()->filter($filters)->with('category','images')->paginate(16)->withQueryString(),
            'address' => $result
        ]);
    }

    public function show(Listing $listing): Response
    {
        return Inertia::render('ShowListing', [
            'listing' => $listing->load('images')
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Auth/CreateListing');
    }

    public function store(Request $request): RedirectResponse
    {

        $attributes = $request->validate([
            'title'=>['required'],
            'description'=>['required'],
            'price'=>['required','min:1','max:5000'],
            'category_id'=>['required','exists:categories,id'],
            'images.*'=>['required','image'],
            'images'=>['required','array'],
            'street_name'=>['required', 'min:1','max:20'],
            'houseN'=>['required', 'integer'],
            'zip'=>['required','integer'],
            'city'=>['required'],
            'country'=>['required']
        ]);

        $address = Address::create([
            'streetname'=>$attributes['street_name'],
            'house_number'=>$attributes['houseN'],
            'zip'=>$attributes['zip'],
            'city'=>$attributes['city'],
            'country'=>$attributes['country']
        ]);


        $listing = Listing::create([
           'title' => $attributes['title'],
           'description'=> $attributes['description'],
           'price'=> $attributes['price'],
           'category_id'=> $attributes['category_id'],
           'user_id' => auth()->id(),
            'address_id'=> $address->id
        ]);

        foreach ($request->file('images') as $image){
            $image_path = $image->store('Listing_images', 'public');

            Image::create([
                'listing_id'=> $listing->id,
                'image_path'=>$image_path
            ]);
        }




        return redirect()->back()->with('message', 'Listing has been created');
    }

}
