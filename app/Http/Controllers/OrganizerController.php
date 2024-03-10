<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    //
    public function dashboard() {
        $myEvents = Event::where('user_id' , auth()->user()->id)->get();
        return view('organizer.organizer' , ['myEvents' => $myEvents]);
    }
}
