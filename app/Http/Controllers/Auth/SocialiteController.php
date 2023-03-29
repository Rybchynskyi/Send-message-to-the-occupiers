<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function github()
    {
        return Socialite::driver('github')
            ->redirect();
    }

    public function githubCallBack()
    {
        $githubUser = Socialite::driver('github')->user();

        if (User::where('email', $githubUser->email)->exists()) {
            $thisUser = User::firstWhere('email', $githubUser->email);

            if($githubUser->attributes['id'] == $thisUser->github_id){
                auth()->login($thisUser);
                return redirect(route('cabinet.view', ['locale' => App::getLocale()]));
            }
            else {
                if($thisUser->facebook_id){
                    abort(403, 'You was registered by Facebook');
                }
                else if($thisUser->google_id){
                    abort(403, 'You was registered by Google');
                }
                else abort(403, 'You was already registered');
            }
        }
        else {
            $user = User::query()->updateOrCreate([
                'github_id' => $githubUser->id,
            ], [
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'password' => bcrypt(str()->random(20))
            ]);
            auth()->login($user);
            return redirect(route('cabinet.view', ['locale' => App::getLocale()]));
        }
    }

    public function google()
    {
        return Socialite::driver('google')
            ->redirect();
    }

    public function googleCallBack()
    {
        $googleUser = Socialite::driver('google')->user();

        if (User::where('email', $googleUser->email)->exists()) {
            $thisUser = User::firstWhere('email', $googleUser->email);

            if($googleUser->attributes['id'] == $thisUser->google_id){
                auth()->login($thisUser);
                return redirect(route('cabinet.view', ['locale' => App::getLocale()]));
            }
            else {
                if($thisUser->facebook_id){
                    abort(403, 'You was registered by Facebook');
                }
                else if($thisUser->github_id){
                    abort(403, 'You was registered by Github');
                }
                else abort(403, 'You was already registered');
            }
        }
        else {
            $user = User::query()->updateOrCreate([
                'google_id' => $googleUser->id,
            ], [
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'password' => bcrypt(str()->random(20))
            ]);
            auth()->login($user);
            return redirect(route('cabinet.view', ['locale' => App::getLocale()]));
        }
    }

    public function facebook()
    {
        return Socialite::driver('facebook')
            ->redirect();
    }

    public function facebookCallBack()
    {
        $facebookUser = Socialite::driver('facebook')->user();

        if (User::where('email', $facebookUser->email)->exists()) {
            $thisUser = User::firstWhere('email', $facebookUser->email);

            if($facebookUser->attributes['id'] == $thisUser->facebook_id){
                auth()->login($thisUser);
                return redirect(route('cabinet.view', ['locale' => App::getLocale()]));
            }
            else {
                if($thisUser->githun_id){
                    abort(403, 'You was registered by Gitub');
                }
                else if($thisUser->google_id){
                    abort(403, 'You was registered by Google');
                }
                else abort(403, 'You was already registered');
            }
        }
        else {
            $user = User::query()->updateOrCreate([
                'facebook_id' => $facebookUser->id,
            ], [
                'name' => $facebookUser->name,
                'email' => $facebookUser->email,
                'password' => bcrypt(str()->random(20))
            ]);
            auth()->login($user);
            return redirect(route('cabinet.view', ['locale' => App::getLocale()]));
        }
    }
}
