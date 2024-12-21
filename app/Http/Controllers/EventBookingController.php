<?php

namespace App\Http\Controllers;

use App\Models\EventBooking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class EventBookingController extends Controller
{

    public function eventManager(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'event_type' => 'required',
            'event_date' => 'required|date',
        ]);

        // Save the event booking details
        $events = new EventBooking();
        $events->name = $request->name;
        $events->email = $request->email;
        $events->phone = $request->phone;
        $events->event_type = $request->event_type;
        $events->event_date = $request->event_date;
        $events->save();

        $storedEvent = EventBooking::find($events->id);
        // Redirect to the event booking page after successful booking
        return view('event-booking',compact('storedEvent'));
        // return redirect()->back()->with('status','Booking confirmed');
    }
}




