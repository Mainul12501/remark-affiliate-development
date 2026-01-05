<?php

namespace App\Http\Controllers\Front\Influencer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
}
