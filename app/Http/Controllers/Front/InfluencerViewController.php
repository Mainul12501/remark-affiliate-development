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
    public function dashboard()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => CustomHelper::loggedUser()->load('userInfo'),
        ], 'front.influencer.dashboard');
        return view('front.influencer.dashboard');
    }
    public function albums()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => CustomHelper::loggedUser()->load('userInfo'),
        ], 'front.influencer.albums');
        return view('front.influencer.albums');
    }
    public function bankInfo()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => CustomHelper::loggedUser()->load('userInfo'),
        ], 'front.influencer.bank-info');
        return view('front.influencer.bank-info');
    }
    public function saleHistory()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => CustomHelper::loggedUser()->load('userInfo'),
        ], 'front.influencer.bank-info');
        return view('front.influencer.sale-history');
    }
    public function profile()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => CustomHelper::loggedUser()->load('userInfo'),
        ], 'front.influencer.profile');
        return view('front.influencer.profile');
    }
    public function profileView()
    {
        return view('front.influencer.profile.profile');
    }
}
