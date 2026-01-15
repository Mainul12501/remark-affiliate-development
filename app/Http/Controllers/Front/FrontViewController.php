<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class FrontViewController extends Controller
{
    public function index()
    {
        return view('front.home.home');
    }
    public function benefits(Request $request)
    {
        return CustomHelper::returnDataForWebOrApi([
            'type'  => $request->type,
        ], 'front.home.benefits');
        return view('front.home.benefits');
    }
}
