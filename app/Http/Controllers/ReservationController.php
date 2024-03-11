<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function store(Request $request) {

        $event = Event::find($request->event);
        if ($event->remaining_seats < 1) {
            return back()->with('error' , 'No seats remaining');
        }else{
           if ($event->validation_type === '0') {
                $newReservation = Reservation::create([
                    'client_id' => auth()->user()->id,
                    'event_id' => $event->id,
                    'status' => 'pending',
                ]);
               return back()->with('success' , 'wait for the reservation to be approved');
           }else {
               $newReservation = Reservation::create([
                   'client_id' => auth()->user()->id,
                   'event_id' => $event->id,
                   'status' => 'approved',
               ]);
               $event->remaining_seats--;
               $event->update();
               return back()->with('success' , 'You ticket has been reserved');
           }
        }



    }
    // --- Accepted Reservation ---
    public function accepted(Request $request) {
        $reservation =  Reservation::find($request->reservation);
        $event = Event::find($reservation->event_id);
        $reservation->status = 'approved';
        $reservation->update();
        $event->remaining_seats--;
        $event->update();

        return back()->with('message' , 'The reservation has been approved');
    }
    public function declined(Request $request) {
        $reservation =  Reservation::find($request->reservation);
        $reservation->status = 'declined';
        $reservation->update();

        return back()->with('message' , 'The reservation has been declined');
    }
}
