<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    //
    public function dashboard() {
        return view('admin.dashboard');
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

    public function suspendUser($userId, Request $request)
    {
        $user = User::find($userId);

        if ($user) {
            if ($user->suspended) {
                $user->suspended = false;
                $user->save();
                return redirect()->back()->with('success', 'User unsuspended successfully.');
            }
            else {
                $user->suspended = true;
                $user->suspended_until = Carbon::now()->addDays($request->input('duration'));
                $user->save();

                return redirect()->back()->with('success', 'User suspended successfully.');
            }
        }

        return redirect()->back()->with('error', 'Failed to suspend user.');
    }
}
