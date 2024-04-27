<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Team;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        // return Socialite::driver('google')->redirect();

        return Socialite::driver("google")
            ->stateless()
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver("google")
            ->stateless()
            ->user();
        $user = User::where("email", $googleUser->email)->first();
        if (!$user) {
            $user = User::create([
                "name" => $googleUser->name,
                "email" => $googleUser->email,
                "password" => \Hash::make(rand(100000, 999999)),
            ]);
            $team = $user->ownedTeams()->create([
                "name" => $user->name . "'s Team",
                "personal_team" => false,
            ]);

            // Optionally, set the team as the user's current team
            $user->current_team_id = $team->id;
            $user->save();
        }

        Auth::login($user);

        return view("dashboard");
    }
}
