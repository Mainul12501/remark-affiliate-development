<?php

namespace App\Http\Controllers\Front;

use App\Helper\HelperClass;
use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Campaigns\InfluencerCampain;
use App\Models\Product\ProductCategory;
use App\Models\User;
use App\Models\UserBankInfo;
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
            'productCategories' => CustomHelper::requestApi('categories', 'get', [], HelperClass::getRestApiHeaderKey())['data'],
            'influencerCampaigns'   => InfluencerCampain::where([
                'created_by' => CustomHelper::loggedUser()->id,
                'status'     => 1,
            ])->with('affiliateCodes')/*->select('id', 'cam_short_uri', 'thumb_image')*/->paginate(14),
        ], 'front.influencer.albums');
        return view('front.influencer.albums');
    }
    public function bankInfo()
    {
        $loggedUser = HelperClass::getUserWithUserInfo();
        $loggedUser->userInfo();
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => $loggedUser,
            'banks'         => Bank::latest()->get(['id', 'name']),
            'bankInfo'      => UserBankInfo::where(['user_id' => $loggedUser->id, 'active_status' => 1])->first(),
        ], 'front.influencer.bank-info');
        return view('front.influencer.bank-info');
    }
    public function saleHistory()
    {
        return CustomHelper::returnDataForWebOrApi([
            'loggedUser'    => HelperClass::getUserWithUserInfo(),
        ], 'front.influencer.sale-history');
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


}
