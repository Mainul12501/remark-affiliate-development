<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Backend\EmployerCompany;
use App\Models\User;
use App\Models\UserInfo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider, Request $request)
    {
        if ($request->has('user'))
        session()->put('userType', $request->user ?? 'influencer');

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider, Request $request)
    {
        $user = Socialite::driver($provider)->user();

        $existingUser = User::where('email', $user->email)->first();
//        $customLoginController = new CustomLoginController();
        if ($existingUser) {
            Auth::login($existingUser);
//            return $customLoginController->redirectsAfterLogin($existingUser);
            if ($existingUser->user_type == "influencer")
            {
                Toastr::success('You logged in successfully.');
                return redirect()->route('influencer.profile-verify');
            } elseif ($existingUser->user_type == "partner")
            {
                Toastr::success('You logged in successfully.');
                return redirect()->route('partner.profile-verify');
            }
        } else {
            $userType = session('userType') ?? 'influencer';
            $newUser = User::createUseronOAuth($user, $provider, $userType);

            $userInfo = UserInfo::createUserInfoForOAuth($newUser, $provider);

            Auth::login($newUser);
            Toastr::success('You logged in successfully!', 'Success');
            if (session()->has('userType')) {
                if ($newUser->user_type == "influencer")
                    return redirect()->route('influencer.profile-verify');
                elseif ($newUser->user_type == "partner")
                    return redirect()->route('partner.profile-verify');
            } else {
                Auth::logout();
                return redirect()->route('home');
            }
        }
        return redirect()->route('home');
    }
}
