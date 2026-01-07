<?php

namespace App\Models\Product;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class Product extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'product_brand_id',
        'title',
        'slug',
        'thumb_img',
        'regular_price',
        'price',
        'sale_price',
        'sku',
        'status',
        'herlan_product_id',
        'herlan_product_uri',
        'affiliate_commission_rate',
        'total_clicked',
        'sold_count',
        'short_description',
        'long_description',
    ];

    protected $searchableFields = ['*'];

    public static function getHerlanProductList()
    {
        return CustomHelper::requestApi('http://127.0.0.1:800/api/herlan-product-list', 'get', [], []);
    }

    public static function syncProductList()
    {
        $response = self::getHerlanProductList();
        if (!isset($response['success']) || $response['success'] !== true) {
            \Log::error('Failed to fetch Herlan products', ['response' => $response]);
            return [
                'success' => false,
                'message' => 'Failed to fetch products from API',
                'error' => $response['error'] ?? 'Unknown error'
            ];
        }

        DB::transaction(function () use ($response) {

            foreach ($response['data'] as $herlanProduct) {
                $product = static::withTrashed()->updateOrCreate(
                    ['herlan_product_id' => $herlanProduct['id']],
                    [
                        'product_brand_id'      => $herlanProduct['brand']['id'] ?? null,
                        'title'                 => $herlanProduct['name'] ?? '',
                        'slug'                  => $herlanProduct['slug'] ?? '',
                        'regular_price'         => $herlanProduct['regular_price'] ?? 0,
                        'price'                 => $herlanProduct['price'] ?? 0,
                        'sale_price'            => $herlanProduct['sale_price'] ?? 0,
                        'sku'                   => $herlanProduct['sku'] ?? '',
                        'status'                => $herlanProduct['status'] === 'publish' ? 1 : 0,
                        'herlan_product_id'     => $herlanProduct['id'],
                        'herlan_product_uri'    => $herlanProduct['uri'] ?? '',
                        'short_description'     => $herlanProduct['short_description'] ?? '',
                        'long_description'      => $herlanProduct['description'] ?? '',
                        'thumb_img'             => $herlanProduct['images'][0]['src'] ?? '',
                    ]
                );
                if (!empty($herlanProduct['images']))
                {
                    ProductImage::createOrUpdateProductImage($herlanProduct['images'], $product);
                }
                ProductBrand::createOrUpdateSingleBrand($herlanProduct['brand']);
            }

        });

        foreach ($response['data'] as $herlanProduct) {
            $product = static::withTrashed()->updateOrCreate(['herlan_product_id' => $herlanProduct['id']], [
                'product_brand_id' => $herlanProduct['product_brand_id'],
                'title' => $herlanProduct['title'] ?? '',
                'slug' => $herlanProduct['slug'] ?? '',
                'thumb_img' => $herlanProduct['thumb_img'] ?? '',
                'regular_price' => $herlanProduct['regular_price'] ?? 0,
                'price' => $herlanProduct['price'] ?? 0,
                'sale_price' => $herlanProduct['sale_price'] ?? 0,
                'sku' => $herlanProduct['sku'] ?? '',
                'status' => $herlanProduct['status'] == 'publish' ? 1 : 0,
                'herlan_product_id' => $herlanProduct['id'],
                'herlan_product_uri' => $herlanProduct['uri'] ?? '',
                'short_description' => $herlanProduct['short_description'] ?? '',
                'long_description' => $herlanProduct['long_description'] ?? '',
            ]);

        }
    }

    public function productBrand()
    {
        return $this->belongsTo(ProductBrand::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function affiliateCodes()
    {
        return $this->hasMany(AffiliateCode::class);
    }

    public function giveawayProductRequirementRequestedProducts()
    {
        return $this->hasMany(
            GiveawayProductRequirement::class,
            'requested_product_id'
        );
    }

    public function productCategories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }
}
