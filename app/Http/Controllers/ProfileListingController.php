<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ProfileListingController extends Controller
{
    //

    public function index(): Response
    {
        return Inertia::render('ListProperties', [
            'listings'=> auth()->user()->load('listing'),
        ]);
    }
}
