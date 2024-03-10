<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function home() {

        return view('pages.home');
    }

    public function exploreEvents(Request $request) {

        $categories = Category::all();
        $events = Event::with('category')->where('status', 'accepted')->paginate(12);

        if ($request->ajax()){
            if ($request->get('searchByCategory')){
                $events = Event::with('category')
                    ->where('status', 'accepted')
                    ->whereHas('category' , function ($query) use ($request){
                        $query->where('title' , $request->get('searchByCategory'));
                    })->paginate(12);
                return  response()->json(['events' => $events]);
            }
            if ($request->get('search')) {
                $events = Event::with('category')
                    ->where('status', 'accepted')
                    ->where('title' , 'like','%' . $request->get('search') .'%')
                    ->paginate(12);
                return  response()->json(['events' => $events]);
            }
            return response()->json(['events' => $events]);
        }
        return view('pages.explore-events' , compact('events' , 'categories'));
    }

    public function event(Event $event) {
        $event = Event::with('user')->find($event);
        $hostedEventByOrganizer = Event::where('user_id' , $event[0]->user_id)->get()->count();
        return view('pages.event' , compact('event' , 'hostedEventByOrganizer'));
    }
}
