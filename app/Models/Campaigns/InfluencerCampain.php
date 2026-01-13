<?php

namespace App\Models\Campaigns;

use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function affiliateCodes()
    {
        return $this->hasMany(AffiliateCode::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
