<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\UserBankInfo;
use Illuminate\Http\Request;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class PartnerViewController extends Controller
{
    public function profileVerify()
    {
        return view('front.partner.profile.profile-verify');
    }
    public function dashboard()
    {
        $loggedUser = CustomHelper::loggedUser();
        return view('front.partner.profile.profile', [
            'loggedUser'    => $loggedUser,
            'banks'         => Bank::latest()->get(['id', 'name']),
            'bankInfo'      => UserBankInfo::where(['user_id' => $loggedUser->id, 'active_status' => 1])->first(),
        ]);
    }
}
