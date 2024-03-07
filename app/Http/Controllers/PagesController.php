<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //

    public function home() {

        return view('pages.home');
    }

    public function exploreEvents() {

        return view('pages.explore-events');
    }

    public function event() {

        return view('pages.event');
    }
}
