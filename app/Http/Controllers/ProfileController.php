<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use \App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Nette\Schema\ValidationException;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * update the user's picture.
     */
    public function picture(Request $request) {
            $validatePicture = Validator::make($request->all(), [
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            if ($validatePicture->fails()) {
                return response()->json(['errors' => $validatePicture->errors() , 'status' => false]);
            }

            $user = User::find($request->profileId);
            $picture = $request->file('picture')->store('uploads');
            $user->picture = $picture;
            $user->update();
            return response()->json(['picture' => $user->picture , 'status' => true]);
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
