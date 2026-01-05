<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class InfluencerViewController extends Controller
{
    public function profileVerify()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => CustomHelper::loggedUser()->load('userInfo'),
        ], 'front.influencer.profile.profile-verify');
        return view('front.influencer.profile.profile-verify');
    }
    public function profile()
    {
        return view('front.influencer.profile.profile');
    }
}
