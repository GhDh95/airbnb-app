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



        $geocoder = new Geocoder(env('GEOCODER_API_KEY'));
        $listings = Listing::query()
            ->latest()
            ->filter($filters)
            ->with('category','images','address')
            ->paginate(16)
            ->withQueryString()
           ;


        /* $address = $listing->address->streetname  . " " . $listing->address->house_number . " " . $listing->address->zip . " " . $listing->address->city . " " . $listing->address->country;
            $coordinates = $geocoder->geocode($address)['results'][0]['geometry'];
            $listing->coordinates = $coordinates;*/

        $coordinates = [];
        foreach ($listings as $listing){
            $address = $listing->address->streetname  . " " . $listing->address->house_number . " " . $listing->address->zip . " " . $listing->address->city . " " . $listing->address->country;
            $coordinates[] = ['listing_title' => $listing->title, 'listing_id'=> $listing->id , 'coordinates' => $geocoder->geocode($address)['results'][0]['geometry']?? null, 'price'=>$listing->price];
        }




        return Inertia::render('Welcome',[
            'listings' => $listings,
            'coordinates'=>$coordinates
        ]);
    }

    public function show(Listing $listing): Response
    {
        return Inertia::render('ShowListing', [
            'listing' => $listing->load('images','owner')
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
            'images'=>['required','array','min:1','max:5'],
            'street_name'=>['required', 'min:1','max:20'],
            'houseN'=>['required', 'integer'],
            'zip'=>['required','integer'],
            'city'=>['required'],
            'country'=>['required']
        ]);




        $listing = Listing::create([
           'title' => $attributes['title'],
           'description'=> $attributes['description'],
           'price'=> $attributes['price'],
           'category_id'=> $attributes['category_id'],
           'user_id' => auth()->id()
        ]);


        Address::create([
            'listing_id'=>$listing->id,
            'streetname'=>$attributes['street_name'],
            'house_number'=>$attributes['houseN'],
            'zip'=>$attributes['zip'],
            'city'=>$attributes['city'],
            'country'=>$attributes['country'],
        ]);




        foreach ($request->file('images') as $image){
            $image_path = $image->store('Listing_images','public');

            Image::create([
                'listing_id'=> $listing->id,
                'image_path'=>$image_path
            ]);
        }




        return redirect()->back()->with('message', 'Listing has been created');
    }

    public function destroy(Listing $listing): RedirectResponse{
        $listing->delete();
        return redirect()->back()->with('message', 'Listing has been deleted');
    }

}
