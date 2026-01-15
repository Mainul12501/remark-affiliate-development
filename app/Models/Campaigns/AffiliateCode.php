<?php

namespace App\Models\Campaigns;

use App\Models\Product\Product;
use App\Models\Scopes\Searchable;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

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

    public static function createAffiliateCode($request, $product, $influencerCampaign)
    {
        return static::query()->create([
            'created_by' => CustomHelper::loggedUser()->id,
//            'is_parent_code' => $request->is_parent_code ? 1 : 0,
            'code' => CustomHelper::generateCode(8, 'random'),
            'product_id' => $product['id'],
            'product_ref_link' => $request->product_ref_link,
//            'total_hit' => $request->total_hit,
//            'total_order' => $request->total_order,
//            'total_sell' => $request->total_sell,
            'product_sku' => $product['sku'],
//            'status' => $request->status,
            'influencer_campain_id' => $influencerCampaign->id,
        ]);
    }

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
