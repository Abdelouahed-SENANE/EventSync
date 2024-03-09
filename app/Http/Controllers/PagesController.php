<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function home() {

        return view('pages.home');
    }

    public function exploreEvents(Request $request) {

        $events = Event::where('status', 'accepted')->paginate(4);
        if ($request->ajax()){
            return response()->json(['events' => $events]);
        }
        return view('pages.explore-events' , compact('events'));
    }

    public function event() {

        return view('pages.event');
    }
}
