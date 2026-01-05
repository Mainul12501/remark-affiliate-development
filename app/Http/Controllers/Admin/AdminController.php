<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard(){
        if(Auth::check() && Auth::user()->user_type =='admin'){
            return view('admin.dashboard.home');
        }else{
            Auth::logout();
            return  redirect('/')->with(['message'=>'This action is Unauthorized','alert-type'=>'error']);
        }
    }

    public function login(){
        return view('admin.auth.login');
    }

    public function processToLogin(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'email'     =>  'required|email',
            'password'  =>  'required|string',
        ]);

        if($validation->fails()){
            return back()->withErrors($validation)->withInput();
        }

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){

            if(Auth::user()->user_type == 'admin'){
                    return redirect('/admin/dashboard')->with(['message'=>'Welcome to dashboard .','alert-type'=>'primary']);
            }elseif(Auth::user()->user_type !== 'admin'){
                Auth::logout();
                return  redirect('/')->with(['message'=>'This action is Unauthorized','alert-type'=>'error']);
            }else{
                Auth::logout();
                return  redirect()->back();
            }
        }else{
            return back()->with(['message'=>"Credentials not matched .",'alert-type'=>'error']);
        }
    }

    public function resetPassword(){
        return view('admin.auth.reset-password');
    }
    public function updateResetPw(Request $request)
    {
        if($request->is('admin/*')){
            $validator = Validator::make($request->all(), [

                'email' => 'required|email|exists:users,email',
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'confirmed',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$]).+$/'
                ],

                'password_confirmation' => 'required|same:password',

            ], [
                // Email
                'email.required'    => 'Email field is required.',
                'email.email'       => 'Please enter a valid email address.',
                'email.exists'      => 'Email does not exist in our records.',

                // Password
                'password.required'  => 'Password field is required.',
                'password.min'       => 'Password must be at least 8 characters.',
                'password.confirmed' => 'Password and confirm password must match.',
                'password.regex'     => 'Password must contain uppercase, lowercase, number and one special character (@, #, $).',

                // Confirm Password
                'password_confirmation.required' => 'Confirm password field is required.',
                'password_confirmation.same'     => 'Confirm password does not match.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            $user = User::where('email', strtolower($request->email))
                ->whereIn('user_type', ['admin'])
                ->update([
                    'password'           => Hash::make($request->password),
                    'password_changed_at'=> now(),   // ⬅️ এখানে সেট করলেন
                ]);


            if(!empty($user)){
                return redirect('admin/login')->with(['message'=>'Password Reset Successfully !!','alert-type'=>'primary']);
            }else{
                return redirect()->back()->with(['message'=>'Password Reset Failed.','alert-type'=>'error']);
            }
        }else{
            Auth::logout();
            return  redirect()->back()->with(['message'=>'This action is Unauthorized','alert-type'=>'error']);
        }
    }
    public function logout(Request $request){
        if($request->is('admin/*')) {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }
        return redirect('/admin/login');
    }
}
