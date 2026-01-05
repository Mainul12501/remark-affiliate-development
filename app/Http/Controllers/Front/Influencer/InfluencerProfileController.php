<?php

namespace App\Http\Controllers\Front\Influencer;

use App\Helper\HelperClass;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class InfluencerProfileController extends Controller
{
    public function profileImageUpdate(Request $request)
    {
        try {
            $request->validate([
                'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:5120', // 5MB max
            ]);
            $imagePath = CustomHelper::fileUpload($request->file('profile_image'), 'influencer/profile', 'influencer-profile', $loggedUser->profile_image ?? null);
            CustomHelper::loggedUser()->update(['profile_image' => $imagePath]);
//            $loggedUser->profile_image = $imagePath;
//            $loggedUser->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Profile image uploaded successfully',
                'image_url' => asset($imagePath)
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to upload image: ' . $e->getMessage()
            ], 500);
        }
    }

    public function requestProfileReview(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'email',
            'mobile' => 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/',
        ], [
            'name.required' => 'Influencer Name is required.',
            'email.email' => 'Provide a valid email address.',
            'mobile.regex' => 'Provide a valid mobile number.',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
            return CustomHelper::returErrorMessage($validator->errors());
        }
        $loggedUser = CustomHelper::loggedUser();
        try {
            DB::transaction(function () use ($request, $loggedUser) {
                User::createOrUpdateUser($request, $loggedUser);
                UserInfo::createOrUpdateUserInfo($request, $loggedUser, $loggedUser->userInfo());
            });
            return CustomHelper::returnSuccessMessage('Profile updated successfully and placed for admin review. ');
        } catch (\Exception $exception)
        {
            return $exception->getMessage();
            return CustomHelper::returErrorMessage('Failed to update profile review. ' );
        }

    }
}
