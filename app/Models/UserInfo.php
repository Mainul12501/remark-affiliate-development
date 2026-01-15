<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserInfo extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'bio',
        'current_balance',
        'total_conversion',
        'total_earnings',
        'tiktalk_profile_link',
        'is_tiktalk_varified',
        'fb_profile_link',
        'is_fb_verified',
        'youtube_profile_link',
        'is_youtube_verified',
        'tin_number',
        'bin_number',
        'tin_cert_img',
        'nid',
        'insta_profile_link',
        'is_insta_verified',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'user_infos';

    public static function createUserInfoForOAuth($newUser, $provider)
    {
        return UserInfo::create([
            'user_id' => $newUser->id,
            'is_youtube_verified'   => $provider == 'google' ? 1 : 0,
            'is_fb_verified'   => $provider == 'facebook' ? 1 : 0,
            'is_tiktalk_varified'   => $provider == 'tiktok' ? 1 : 0,
            'is_insta_verified'   => $provider == 'instagram' ? 1 : 0,
        ]);
    }
    public static function createOrUpdateUserInfo($request, $newUser, $userInfo = null)
    {

        return static::updateOrCreate(['id' => $userInfo?->id],[
            'user_id' => $newUser->id,
            'bio' => $request->bio ?? $userInfo?->bio,
//            'current_balance' => $request->current_balance ?? $userInfo?->current_balance,
//            'total_conversion' => $request->total_conversion ?? $userInfo?->total_conversion,
//            'total_earnings' => $request->total_earnings ?? $userInfo?->total_earnings,
            'tiktalk_profile_link' => $request->tiktalk_profile_link ?? $userInfo?->tiktalk_profile_link,
//            'is_tiktalk_varified' => $request->is_tiktalk_varified ?? $userInfo?->is_tiktalk_varified,
            'fb_profile_link' => $request->fb_profile_link ?? $userInfo?->fb_profile_link,
//            'is_fb_verified' => $request->is_fb_verified ?? $userInfo?->is_fb_verified,
            'youtube_profile_link' => $request->youtube_profile_link ?? $userInfo?->youtube_profile_link,
//            'is_youtube_verified' => $request->is_youtube_verified ?? $userInfo?->is_youtube_verified,
            'tin_number' => $request->tin_number ?? $userInfo?->tin_number,
            'bin_number' => $request->bin_number ?? $userInfo?->bin_number,
            'tin_cert_img' => $request->tin_cert_img ?? $userInfo?->tin_cert_img,
            'nid' => $request->nid ?? $userInfo?->nid,
            'insta_profile_link' => $request->insta_profile_link ?? $userInfo?->insta_profile_link,
//            'is_insta_verified' => $request->is_insta_verified ?? $userInfo?->is_insta_verified,
        ]);

    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
