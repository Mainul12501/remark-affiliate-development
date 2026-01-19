<?php

namespace App\Models\Campaigns;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class InfluencerCampain extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'type',
        'created_by',
        'title',
        'parent_ref_code',
        'thumb_img',
        'note',
        'total_viewed',
        'cam_full_url',
        'cam_short_uri',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'influencer_campains';

    public static function createOrEditInfluencerCampain($request, $product = null, $influencerCampaign = null)
    {
        $loggedUser = CustomHelper::loggedUser();
        $campainCode = CustomHelper::generateCode(8, 'random');
        return static::updateOrCreate(['id' => $influencerCampaign?->id], [
            'type'              => $request->type,
            'created_by'        => CustomHelper::loggedUser()->id,
            'title'             => $request->title ?? 'single-album-'.CustomHelper::generateCode(6, 'alpha'),
            'parent_ref_code'   => $request->parent_ref_code ?? $campainCode,
            'thumb_img'         => $request->has('thumb_img') ? CustomHelper::fileUpload($request->file('thumb_img'), 'album-thumb-img', 'album-thumb-img', 500, 400) : $product['images'][0]['src'],
            'note'              => $request->note ?? '',
//            'total_viewed'      => $request->total_viewed,
//            'cam_full_url'      => $request->cam_full_url ?? "https://herlan.com/$loggedUser->username/$campainCode",
//            'cam_short_uri'     => $request->cam_short_uri ?? "https://herlan.com/$campainCode",
            'status'            => 1,
        ]);
    }

    public function affiliateCodes()
    {
        return $this->hasMany(AffiliateCode::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
