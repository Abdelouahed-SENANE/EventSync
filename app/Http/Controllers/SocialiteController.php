<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    //
    public function redirectToGoogle() {

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback() {

        try {
            $user = Socialite::driver('google')->user();

            $findUser = User::where('social_id' , $user->id)->first();
            if($findUser) {
                Auth::login($findUser);
                return redirect('/');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'picture' => 'uploads/avatar.png',
                    'social_id' => $user->id,
                    'social_type' => 'google',
                    'password' => Hash::make('my-google')
                ]);
                Auth::login($newUser);
                return redirect('/');
            }
        }catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
