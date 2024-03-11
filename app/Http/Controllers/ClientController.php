<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function dashboard() {
        $reservations = Reservation::with('event')->where('client_id' , auth()->user()->id)->get();
        return view('client.client' , compact('reservations'));
    }
    public function download() {

    }
}
