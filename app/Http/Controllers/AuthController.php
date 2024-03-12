<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleCallback(Request $request)
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::updateOrCreate([
            'email' => $githubUser->email,
        ], [
            'name' => $githubUser->nickname ?: $githubUser->email,
            'email' => $githubUser->email,
            'password' => bcrypt($githubUser->email)
        ]);

        Auth::login($user);

        return redirect()->route('listings.create');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('listings.home');
    }
}
