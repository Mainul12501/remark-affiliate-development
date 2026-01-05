<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnerViewController extends Controller
{
    public function profileVerify()
    {
        return view('front.partner.profile.profile-verify');
    }
    public function dashboard()
    {
        return view('front.partner.profile.profile');
    }
}
