<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    //
    public function create() {
        $categories = Category::all();

        return view('organizer.create-event' , ['categories' => $categories]);
    }
    public function store(Request $request) {

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'date' => 'required',
            'venue' => ['required', 'string', 'regex:/^[^\d]*$/'],
            'description' => 'required|string|max:500',
            'price' => 'required|numeric|min:0',
            'seats' => 'required|integer|min:1',
            'category' => 'required',
            'validation' => 'required'
        ]);
        $image = $request->file('image')->store('upload');
        $newEvent = Event::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $image,
            'date' => $request->input('date'),
            'venue' => $request->input('venue'),
            'number_of_seats' => $request->input('seats'),
            'price' =>$request->input('price'),
            'validation_type' => $request->input('validation'),
            'user_id' => $request->input('user'),
            'category_id' => $request->input('category'),
        ]);
        return redirect()->route('organizer');
    }

    // === Accept Events ===
    public function accepted(Request $request) {
        $event = Event::find($request->event);
        if ($event) {
            $event->validated_at = now();
            $event->status = 'accepted';
            $event->update();

        }
        return back();
    }

    public function refused(Request $request) {
        $event = Event::find($request->event);
        if ($event) {
            $event->validated_at = now();
            $event->status = 'refused';
            $event->update();

        }
        return back();
    }

    public function delete(Request $request) {
        $event = Event::find($request->id);
        $event->delete();
        return back();
    }

}
