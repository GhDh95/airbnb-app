<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Reservation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReservationController extends Controller
{
    //

    public function index(){
        return Inertia::render('ManageReservation', [
            'reservations' => Reservation::where('user_id', auth()->user()->id)->with('user','listing')->get()
        ]);
    }

    public function store(Listing $listing, Request $request){
        $attributes = $request->validate([
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date','after:start_date'],
        ]);

        //format dates
        $attributes['start_date'] = date('Y-m-d', strtotime($attributes['start_date']));
        $attributes['end_date'] = date('Y-m-d', strtotime($attributes['end_date']));

        //check if available
        if(Reservation::unavailableDates($listing->id, $attributes['start_date'], $attributes['end_date'])->count() > 0){
            $message = "The selected dates are not available";
        }else{
            Reservation::create([
                'listing_id' => $listing->id,
                'user_id' => auth()->user()->id,
                'start_date' => $attributes['start_date'],
                'end_date' => $attributes['end_date'],
            ]);

            $message = "Your reservation has been made";
        }



        return redirect()->back()->with('message', $message);
    }

    public function destroy(Reservation $reservation): RedirectResponse
    {
        $reservation->delete();
        $message = "Your reservation has been deleted";
        return redirect()->back()->with('message', $message);
    }
}
