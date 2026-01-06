<?php

namespace App\Models\Product;

use App\Helper\HelperClass;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class ProductBrand extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'logo',
        'status',
        'herlan_brand_id',
        'herlan_brand_slug',
        'herlan_brand_uri',
        'note',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'product_brands';

    public static function getHerlanBrandList()
    {
//        return HelperClass::requestApi('https://695cac7d79f2f34749d4f260.mockapi.io/api/sync-herlan-brands', 'get', [], []);
//        return HelperClass::requestApi('http://127.0.0.1:800/api/sync-herlan-brands', 'get', [], []);
        return CustomHelper::requestApi('http://127.0.0.1:800/api/sync-herlan-brands', 'get', [], []);
    }

    public static function syncBrands()
    {
        $response = self::getHerlanBrandList();
        // Ensure API call succeeded
        if (!isset($response['success']) || $response['success'] !== true) {
            return false;
        }

        foreach ($response['data'] as $herlanBrand) {

            $brand = static::withTrashed()->updateOrCreate(['herlan_brand_id' => $herlanBrand['id']], [
                    'name'               => $herlanBrand['name'],
                    'slug'               => $herlanBrand['slug'] ?? Str::slug($herlanBrand['name']),
                    'logo'               => $herlanBrand['logo'] ?? null,
                    'status'             => $herlanBrand['status'] ?? 1,
                    'herlan_brand_slug'  => $herlanBrand['slug'] ?? null,
                    'herlan_brand_uri'  => $herlanBrand['herlan_brand_uri'] ?? null,
                    'note'               => $herlanBrand['note'] ?? 'Synced from Herlan API',
                ]
            );

            // Restore if it was soft-deleted
//            if ($brand->trashed()) {
//                $brand->restore();
//            }
        }
        return true;
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
