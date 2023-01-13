<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;


class LoginWithGoogleController extends Controller
{
    //
    public function redirectToGoogle()
    {
        return Socialite::driver("google")->redirect();
    }
    public function handleGoogleCallback()
    {
        try {
            Log::alert("ioio");
            $user = Socialite::driver("google")->stateless()->user();
            $finduser = User::where("google_id", $user->id)->first();

            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended("mytackle");
            } else {
                $user = User::create([
                    "name" => $user->name,
                    "email" => $user->email,
                    "google_id" => $user->id,
                    "password" => encrypt("m87XHpgQiWqh"),
                ]);

                Auth::login($user);

                return redirect()->intended("mytackle");
            }
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
