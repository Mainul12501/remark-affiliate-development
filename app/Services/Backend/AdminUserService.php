<?php

namespace App\Services\Backend;

use Intervention\Image\Laravel\Facades\Image;

class AdminUserService
{

    public static function imageUpload($request)
    {
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $ext = uniqid() . '.' . $file->getClientOriginalExtension();
            $store = './backend/uploads/';
            $path = $store . $ext;
            Image::read($file)->cover(256, 256)->save($path, quality: 75, progressive: true);
            return $path;
        }
    }
    public static function profileInfoUpdate($request,$user)
    {
        $image = $request->hasFile('profile_image');
        if (!empty($image)) {
            if (file_exists($user->profile_image)) {
                unlink($user->profile_image);
                $imageUrl = self::imageUpload($request);
            } else {
                $imageUrl = self::imageUpload($request);
            }
        } else {
            $imageUrl = $user->profile_image;
        }

        $user->update([
            'mobile'         => $request->mobile_no ?? $user->mobile_no,
            'profile_image'     => $imageUrl ?? $user->profile_image,
        ]);
        return $user;
    }
}
