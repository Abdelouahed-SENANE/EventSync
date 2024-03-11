<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    //
    public function dashboard() {
        $nbrUsers = User::count();
        $nbrReservations = Reservation::count();
        $nbrEvents = Event::count();
        $nbrOrganizer = User::role('organizer')->count();
        $nbrClient = User::role('client')->count();

        return view('admin.dashboard' , compact('nbrOrganizer' , 'nbrReservations' , 'nbrUsers', 'nbrEvents' , 'nbrClient'));
    }

    public function users()
    {
        $users = User::whereNull('deleted_at')->get();
        return view('admin.users', compact('users'));
    }

    public function events() {
        $events = Event::whereNull('validated_at')->get();
        return view('admin.events' , ['events' => $events]);
    }


    public function softDelete($userId)
    {
        $user = User::findOrFail($userId);
        $user->deleted_at = now();
        $user->update();
        return redirect()->back()->with('success', 'User soft deleted successfully.');
    }


}
