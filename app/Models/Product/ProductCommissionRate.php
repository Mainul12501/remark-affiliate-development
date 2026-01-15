<?php

namespace App\Models\Product;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCommissionRate extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'product_sku',
        'commission_type',
        'amount',
        'status',
        'product_name',
        'product_image',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'product_commission_rates';

    public static function createOrUpdateProductCommissionRate($request, $productCommissionRate = null)
    {
        return static::updateOrCreate(['id' => $productCommissionRate?->id], $request->except(['_token', '_method']));
    }
}
