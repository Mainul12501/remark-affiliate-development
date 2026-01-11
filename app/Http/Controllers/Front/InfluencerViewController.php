<?php

namespace App\Http\Controllers\Front;

use App\Helper\HelperClass;
use App\Http\Controllers\Controller;
use App\Models\Product\ProductCategory;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class InfluencerViewController extends Controller
{
    public function profileVerify()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => HelperClass::getUserWithUserInfo(),
        ], 'front.influencer.profile.profile-verify');
        return view('front.influencer.profile.profile-verify');
    }
    public function dashboard()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => HelperClass::getUserWithUserInfo(),
        ], 'front.influencer.dashboard');
        return view('front.influencer.dashboard');
    }
    public function albums()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => HelperClass::getUserWithUserInfo(),
            'productCategories' => ProductCategory::latest()->get(['id', 'name', 'slug']),
        ], 'front.influencer.albums');
        return view('front.influencer.albums');
    }
    public function bankInfo()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => HelperClass::getUserWithUserInfo(),
        ], 'front.influencer.bank-info');
        return view('front.influencer.bank-info');
    }
    public function saleHistory()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => HelperClass::getUserWithUserInfo(),
        ], 'front.influencer.bank-info');
        return view('front.influencer.sale-history');
    }
    public function profile()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => HelperClass::getUserWithUserInfo(),
        ], 'front.influencer.profile');
        return view('front.influencer.profile');
    }
    public function profileView()
    {
        return view('front.influencer.profile.profile');
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $loggedUser = CustomHelper::loggedUser();
        DB::transaction(function () use ($request, $loggedUser) {
            User::createOrUpdateUser($request, $loggedUser);
            UserInfo::createOrUpdateUserInfo($request, $loggedUser, $loggedUser->userInfo);
        });
    }
}
