<?php

namespace App\Http\Controllers\Auth;

use App\Helper\HelperClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Auth\PartnerRegistraionRequest;
use App\Mail\Auth\AuthOtpMail;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('front.auth.login');
    }
    public function partnerRegister()
    {
        return view('front.auth.partner-register');
    }
    public function influencerRegister()
    {
        return view('front.auth.register');
    }

    public function sendOtpMail(Request $request)
    {
        $data = [
            'email' => $request->email,
            'otp' => CustomHelper::generateSessionCode(6, 'number', 'remark_auth'),
            'purpose' => $request->purpose,
        ];
        try {
            Mail::to($request->email)->send(new AuthOtpMail($data));
            return CustomHelper::returnSuccessMessage('An OTP has been sent to your email.');
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 422);
        }

    }

    public function sendOtpSms(Request $request)
    {
        $otp = CustomHelper::generateSessionCode(4, 'number', 'remark_auth');
        try {
            if ($request->for == 'registration') {
                HelperClass::sendOtpSms($request->mobile, "Welcome to Herlan! Your verification code: $otp. Expires in 5 minutes.");
            }
            return response()->json([
                'status' => 'success',
                'message' => 'An OTP has been sent to your phone number.',
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Sorry, we are unable to process your request.',
            ]);
        }
    }
    public function registerPartner(PartnerRegistraionRequest $request)
    {
        if ($request->password != $request->confirm_password) {
            return back()
                ->withInput() // keeps all old form data
                ->withErrors(['confirm_password' => 'Password and Confirm Password do not match']);
        }

        if ($request->user_otp != CustomHelper::getSessionCode('remark_auth'))
        {
            Toastr::error('OTP does not match. Please try again.', 'error');
            return back()->withInput();
        }
        try {
            $user = HelperClass::createAndLoginUser($request);
            $user->
            Toastr::success('Registration Successful', 'Success');
            return redirect()->route('partner.profile-verify');
        } catch (\Exception $exception) {
            Toastr::error($exception->getMessage());
            return back()->withInput();
        }

    }

    public function registerInfluencer(Request $request)
    {
        $request['mobile'] = "0".$request->mobile;
        $user = HelperClass::createAndLoginUser($request);
        Toastr::success('Registration Successful', 'Success');
        return redirect()->route('influencer.profile-verify');
    }

    public function checkUniqueEmailOrPhoneNumber(Request $request)
    {
        $exists = false;

        if ($request->type === 'email') {
            $exists = User::where('email', $request->value)->exists();
        } elseif ($request->type === 'mobile') {
            $exists = User::where('mobile', $request->value)->exists();
        }

        return response()->json([
            'available' => !$exists
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_phone'   => 'required',
            'password'   => 'required',
        ]);
        if ($validator->fails()) {
            Toastr::error(implode(' ', $validator->errors()->all()), 'error');
            return back()->withInput()->withErrors($validator);
        }
        $existuser = User::where('email', $request->email_phone)->orWhere('mobile', $request->email_phone)->first();
        if ($existuser) {
            auth()->login($existuser);
            Toastr::success('Login Successful', 'Success');
            if ($existuser->user_type == 'partner') {
                if ($existuser->approve_status == 1)
                    return redirect()->route('partner.dashboard');
                else
                    return redirect()->route('partner.profile-verify');
            } elseif ($existuser->user_type == 'influencer') {
                if ($existuser->approve_status == 1)
                    return redirect()->route('influencer.dashboard');
                else
                    return redirect()->route('influencer.profile-verify');
            }
            auth()->logout();
            Toastr::error('You are not authorized to access this page.', 'error');
            return redirect()->route('home');
        }
        Toastr::error('Login Failed. User not found', 'Error');
        return back()->withInput();
    }
}
