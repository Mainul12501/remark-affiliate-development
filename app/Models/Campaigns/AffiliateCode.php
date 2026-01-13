<?php

namespace App\Models\Campaigns;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AffiliateCode extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'is_parent_code',
        'code',
        'product_id',
        'product_ref_link',
        'total_hit',
        'total_order',
        'total_sell',
        'product_sku',
        'status',
        'influencer_campain_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'affiliate_codes';

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function influencerCampain()
    {
        return $this->belongsTo(InfluencerCampain::class);
    }
}
