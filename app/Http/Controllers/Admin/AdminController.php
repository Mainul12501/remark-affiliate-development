<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\Backend\CommonRequests\SiteSettingRequest;
use App\Models\SiteSetting;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard.home');
    }

    public function siteSettings(){
        return view('admin.common-views.site-settings', ['siteSetting' => SiteSetting::first()]);
    }

    public function settingsUpdate(SiteSettingRequest $request)
    {

        $validated = $request->validated();

        try {
            $siteSetting = SiteSetting::firstOrNew();

            // Handle file uploads
            $fileFields = ['favicon', 'menu_logo', 'logo', 'banner'];
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $filePath = CustomHelper::fileUpload(request()->file($field), 'site-settings', $siteSetting->$field, $siteSetting[$field]);
                    // Delete old file
//                    if ($siteSetting->$field && File::exists(public_path($siteSetting->$field))) {
//                        File::delete(public_path($siteSetting->$field));
//                    }
//
//                    // Upload new file
//                    $file = $request->file($field);
//                    $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
//                    $filePath = 'uploads/site-settings/' . $fileName;
//
//                    if (!File::exists(public_path('uploads/site-settings'))) {
//                        File::makeDirectory(public_path('uploads/site-settings'), 0755, true);
//                    }
//
//                    $file->move(public_path('uploads/site-settings'), $fileName);
                    $siteSetting->$field = $filePath;
                }
            }

            // Update other fields
            $siteSetting->fill($request->except($fileFields));
            $siteSetting->save();

            return back()->with('success', 'Site settings updated successfully');

        } catch (\Exception $e) {
            \Log::error('Site settings update error: ' . $e->getMessage());
            return back()->with('error', 'Failed to update site settings')->withInput();
        }
    }


//    auth funcitons
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

            if(Auth::user()->account_type != 'frontend'){
                return redirect('/admin/dashboard')->with(['message'=>'Welcome to dashboard .','alert-type'=>'primary']);
            }elseif(Auth::user()->account_type === 'frontend'){
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
                ->whereNotIn('account_type', ['frontend'])
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
