<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ListingController extends Controller
{
    //

    public function index(): Response
    {
        $filters = request()->input();

        return Inertia::render('Welcome',[
            'listings' => Listing::query()->latest()->filter($filters)->with('category','images')->paginate(16)->withQueryString()
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

    public function store(Request $request){

        $attributes = $request->validate([
            'title'=>['required'],
            'description'=>['required'],
            'price'=>['required','min:1','max:5000'],
            'category_id'=>['required','exists:categories,id']
        ]);
        $attributes['user_id'] = auth()->id();

        Listing::create($attributes);

        return redirect()->back()->with('message', 'Listing has been created');
    }

}
