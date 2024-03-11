<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    //
    public function dashboard() {
        $myEvents = Event::where('user_id' , auth()->user()->id)->get();
        $reservations = Reservation::with('event' , 'user')
            ->whereHas('event' , function($query) {
                $query->where('user_id' ,  auth()->user()->id);
            })->where('status' , 'pending')
            ->get();
//        dd($reservations);
        return view('organizer.organizer' , compact('myEvents' , 'reservations'));
    }
    public function statistics()  {
        $nbrAcceptedEvents = Event::where('status' , 'accepted')->where('user_id' , auth()->user()->id)->get()->count();
        $nbrRefusedEvents = Event::where('status' , 'refused')->where('user_id' , auth()->user()->id)->get()->count();
        $nbrEvents = Event::where('user_id' , auth()->user()->id)->get()->count();
        $eventsWithReservations = Event::with('reservation')->where('user_id' , auth()->user()->id)->get();
        $totalReservation = 0;
        foreach ($eventsWithReservations as $event){
            $totalReservation += $event->reservation->count();
        }
        $statistics = [
            'nbrAcceptedEvents' => $nbrAcceptedEvents,
            'nbrRefusedEvents' => $nbrRefusedEvents,
            'nbrEvents' => $nbrEvents,
            'totalReservation' => $totalReservation
        ];
        return response()->json(compact('statistics'));

    }
}
