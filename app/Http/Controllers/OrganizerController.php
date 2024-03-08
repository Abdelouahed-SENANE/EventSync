<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    //
    public function dashboard() {
        $myEvents = Event::all();
        return view('organizer.organizer' , ['myEvents' => $myEvents]);
    }
}
