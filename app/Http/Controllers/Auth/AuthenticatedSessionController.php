<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $authUser = User::where('email' , $request->email)->first();


        if ($authUser && is_null($authUser->deleted_at)) {
            $request->authenticate();
            $request->session()->regenerate();

            if (auth()->user()->hasRole('admin')) {
                return redirect()->intended(RouteServiceProvider::ADMIN);
            } elseif (auth()->user()->hasRole('organizer')) {
                return redirect()->intended(RouteServiceProvider::ORGANIZER);
            } else {
                return redirect()->intended(RouteServiceProvider::CLIENT);
            }
        } elseif ($authUser && !is_null($authUser->deleted_at)) {
            return redirect()->intended(RouteServiceProvider::BANNED);
        } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or account not found']);
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
