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
                if (!empty($herlanProduct['brand']))
                    $brand = ProductBrand::createOrUpdateSingleBrand($herlanProduct['brand']);
                $product = static::withTrashed()->updateOrCreate(
                    ['herlan_product_id' => $herlanProduct['id']],
                    [
                        'product_brand_id'      => $brand->id,
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
//                        'thumb_img'             => $herlanProduct['images'][0]['src'] ?? '',
                    ]
                );
                if (!empty($herlanProduct['images']))
                {
                    ProductImage::createOrUpdateProductImage($herlanProduct['images'], $product);
                }

                if (!empty($herlanProduct['categories']))
                    ProductCategory::assignCategoryToProduct($herlanProduct['categories'], $product);
            }

        });
        return true;
    }

    public static function createOrUpdateProduct ($request, $existingProduct = null)
    {
        $newProduct = DB::transaction(function () use ($request, $existingProduct) {
            $product = static::withTrashed()->updateOrCreate(
                ['herlan_product_id' => $request['id']],
                [
                    'product_brand_id'      => $request['brand']['id'] ?? null,
                    'title'                 => $request['name'] ?? '',
                    'slug'                  => $request['slug'] ?? '',
                    'regular_price'         => $request['regular_price'] ?? 0,
                    'price'                 => $request['price'] ?? 0,
                    'sale_price'            => $request['sale_price'] ?? 0,
                    'sku'                   => $request['sku'] ?? '',
                    'status'                => $request['status'] === 'publish' ? 1 : 0,
                    'herlan_product_id'     => $request['id'],
                    'herlan_product_uri'    => $request['uri'] ?? '',
                    'short_description'     => $request['short_description'] ?? '',
                    'long_description'      => $request['description'] ?? '',
//                        'thumb_img'             => $herlanProduct['images'][0]['src'] ?? '',
                ]
            );
            if (!empty($request['images']))
            {
                ProductImage::createOrUpdateProductImage($request['images'], $product);
            }
            if (!empty($request['brand']))
                ProductBrand::createOrUpdateSingleBrand($request['brand']);
            if (!empty($request['categories']))
                ProductCategory::assignCategoryToProduct($request['categories'], $product);
            return $product;
        });
        return $newProduct;
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
