<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function auth($social){
        if (Auth::id()) {
            return redirect()->route('home');
        }
        return Socialite::driver($social)->redirect();
    }

    public function callback($social){
        if (Auth::id()) {
            return redirect()->route('home');
        }
        $getInfo = Socialite::driver($social)->user();
        $user = $this->createUser($getInfo, $social);
        Auth::login($user);
        return redirect()->route('home');
    }

    public function createUser($getInfo, $social){
        $user = User::query()
            ->where('social_id', $getInfo->getId())
            ->where('social', $social)
            ->first();
        if(empty($user)){
            $user = new User();
            $user->fill([
                'name' => $getInfo->getName(),
                'email' => $getInfo->getEmail(),
                'social' => $social,
                'social_id' => $getInfo->getId(),
                'avatar' => $getInfo->getAvatar()
            ]);
            $user->save();
        }
        return $user;
    }
}
