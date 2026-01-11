<?php
namespace App\Models\Product;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class ProductCategory extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumb_img',
        'status',
        'herlan_cat_id',
        'herlan_cat_slug',
        'herlan_cat_uri',
        'herlan_cat_total_products',
        'product_category_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'product_categories';

    public static function assignCategoryToProduct($productCategories, $product)
    {
        $productCategoryIds = [];
        foreach ($productCategories as $productCategory) {
            $existCategory = ProductCategory::where('herlan_cat_id', $productCategory['id'])->first();
            if ($existCategory) {
                $productCategoryIds[] = $existCategory->id;

            } else {
                $newCategory = static::create([
                    'name'                      => $productCategory['name'],
                    'slug'                      => $productCategory['slug'],
                    'thumb_img'                 => $productCategory['image'],
                    'status'                    => $productCategory['status'] ?? 1,
                    'herlan_cat_id'             => $productCategory['id'],
                    'herlan_cat_slug'           => $productCategory['slug'],
                    'herlan_cat_uri'            => $productCategory['uri'] ?? '',
                    'herlan_cat_total_products' => $productCategory['product_count'] ?? 0,
                    'product_category_id'       => $productCategory['category_id'],
                ]);
                $productCategoryIds[] = $newCategory->id;
            }
        }
        $product->productCategories()->syncWithoutDetaching($productCategoryIds);
        return true;
    }
    public static function createOrUpdateSingleCategory($category)
    {

    }
    public static function getHerlanCategoryList()
    {
        return CustomHelper::requestApi('http://127.0.0.1:800/api/herlan-category-list', 'get', [], []);
    }

    public static function syncProductCategory()
    {
        $response = self::getHerlanCategoryList();

        if (!isset($response['success']) || $response['success'] !== true) {
            \Log::error('Failed to fetch Herlan categories', ['response' => $response]);
            return [
                'success' => false,
                'message' => 'Failed to fetch categories from API',
                'error' => $response['error'] ?? 'Unknown error'
            ];
        }

        $syncResults = [
            'created' => 0,
            'updated' => 0,
            'restored' => 0,
            'deleted' => 0,
            'errors' => []
        ];

        try {
            \DB::beginTransaction();

            // Get all existing Herlan category IDs before sync
            $existingHerlanIds = self::withTrashed()->pluck('herlan_cat_id')->filter()->toArray();
            $processedHerlanIds = [];

            // Process all categories recursively
            foreach ($response['data'] as $herlanCategory) {
                self::syncCategoryRecursive($herlanCategory, null, $processedHerlanIds, $syncResults);
            }

            // Soft delete categories that no longer exist in API
            $deletedIds = array_diff($existingHerlanIds, $processedHerlanIds);
            if (!empty($deletedIds)) {
                $deleted = self::whereIn('herlan_cat_id', $deletedIds)
                    ->whereNull('deleted_at')
                    ->delete();
                $syncResults['deleted'] = $deleted;
            }

            \DB::commit();

            \Log::info('Product categories synced successfully', $syncResults);

            return [
                'success' => true,
                'message' => 'Categories synced successfully',
                'data' => $syncResults
            ];

        } catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('Error syncing product categories', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return [
                'success' => false,
                'message' => 'Failed to sync categories',
                'error' => $e->getMessage()
            ];
        }
    }

    private static function syncCategoryRecursive(
        array $herlanCategory,
        ?int  $parentId,
        array &$processedIds,
        array &$syncResults
    ): ?ProductCategory
    {
        try {
            // Track this category as processed
            $processedIds[] = $herlanCategory['id'];

            // Check if category exists (including soft-deleted)
            $category = self::withTrashed()->where('herlan_cat_id', $herlanCategory['id'])->first();

            $wasDeleted = false;
            $isNew = false;

            if ($category) {
                // Category exists
                if ($category->trashed()) {
                    // Restore soft-deleted category
                    $category->restore();
                    $wasDeleted = true;
                }

                // Update existing category
                $category->update([
                    'name' => $herlanCategory['name'],
                    'slug' => $herlanCategory['slug'],
                    'thumb_img' => $herlanCategory['image'] ?? null,
                    'product_category_id' => $parentId,
                    'herlan_cat_slug' => $herlanCategory['slug'],
                    'herlan_cat_uri' => $herlanCategory['uri'] ?? null,
                    'herlan_cat_total_products' => $herlanCategory['product_count'] ?? 0,
                    'status' => 1,
                ]);

            } else {
                // Create new category
                $category = self::create([
                    'herlan_cat_id' => $herlanCategory['id'],
                    'name' => $herlanCategory['name'],
                    'slug' => $herlanCategory['slug'],
                    'thumb_img' => $herlanCategory['image'] ?? null,
                    'product_category_id' => $parentId,
                    'herlan_cat_slug' => $herlanCategory['slug'],
                    'herlan_cat_uri' => $herlanCategory['uri'] ?? null,
                    'herlan_cat_total_products' => $herlanCategory['product_count'] ?? 0,
                    'status' => 1,
                ]);

                $isNew = true;
            }

            // Track statistics
            if ($isNew) {
                $syncResults['created']++;
            } elseif ($wasDeleted) {
                $syncResults['restored']++;
            } elseif ($category->wasChanged()) {
                $syncResults['updated']++;
            }

            // Process subcategories recursively
            if (isset($herlanCategory['sub_categories']) && is_array($herlanCategory['sub_categories'])) {
                foreach ($herlanCategory['sub_categories'] as $subCategory) {
                    self::syncCategoryRecursive(
                        $subCategory,
                        $category->id,
                        $processedIds,
                        $syncResults
                    );
                }
            }

            return $category;

        } catch (\Exception $e) {
            \Log::error('Error syncing individual category', [
                'herlan_cat_id' => $herlanCategory['id'] ?? 'unknown',
                'name' => $herlanCategory['name'] ?? 'unknown',
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            $syncResults['errors'][] = [
                'herlan_cat_id' => $herlanCategory['id'] ?? null,
                'name' => $herlanCategory['name'] ?? null,
                'error' => $e->getMessage()
            ];

            return null;
        }
    }

    public static function updateProductCategory($request, $existCategory)
    {
        return $existCategory->update([
            'name' => $request['name'],
            'slug' => $request['slug'],
            'thumb_img' => $request['image'] ?? null,
            'product_category_id' => $request['category_id'],
            'herlan_cat_slug' => $request['slug'],
            'herlan_cat_uri' => $request['uri'] ?? null,
            'herlan_cat_total_products' => $request['product_count'] ?? 0,
            'status' => 1,
        ]);
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function productCategories()
    {
        return $this->hasMany(ProductCategory::class, 'product_category_id');
    }

    /**
     * Get all descendants (children, grandchildren, etc.)
     */
    public function descendants()
    {
        return $this->productCategories()->with('descendants');
    }

    /**
     * Get all ancestors (parent, grandparent, etc.)
     */
    public function ancestors()
    {
        return $this->productCategory()->with('ancestors');
    }

    /**
     * Check if category has children
     */
    public function hasProductCategories(): bool
    {
        return $this->productCategories()->exists();
    }

    /**
     * Get category level/depth
     */
    public function getLevel(): int
    {
        $level = 0;
        $productCategory = $this->productCategory;

        while ($productCategory) {
            $level++;
            $productCategory = $productCategory->productCategory;
        }

        return $level;
    }

    /**
     * Get breadcrumb path
     */
    public function getBreadcrumb(): array
    {
        $breadcrumb = [$this];
        $productCategory = $this->productCategory;

        while ($productCategory) {
            array_unshift($breadcrumb, $productCategory);
            $productCategory = $productCategory->productCategory;
        }

        return $breadcrumb;
    }

    /**
     * Scope to get only root categories (no parent)
     */
    public function scopeRoots($query)
    {
        return $query->whereNull('product_category_id');
    }

    /**
     * Scope to get only leaf categories (no children)
     */
    public function scopeLeaves($query)
    {
        return $query->doesntHave('productCategories');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}


//
//namespace App\Models\Product;
//
//use App\Models\Scopes\Searchable;
//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\SoftDeletes;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Mainul\CustomHelperFunctions\Helpers\CustomHelper;
//
//class ProductCategory extends Model
//{
//    use HasFactory;
//    use Searchable;
//    use SoftDeletes;
//
//    protected $fillable = [
//        'name',
//        'slug',
//        'thumb_img',
//        'status',
//        'herlan_cat_id',
//        'herlan_cat_slug',
//        'herlan_cat_uri',
//        'herlan_cat_total_products',
//        'product_category_id',
//    ];
//
//    protected $searchableFields = ['*'];
//
//    protected $table = 'product_categories';
//
//    public static function getHerlanCategoryList()
//    {
//        return CustomHelper::requestApi('http://127.0.0.1:800/api/herlan-category-list', 'get', [], []);
//    }
//
//    public static function syncProductCategory ()
//    {
//        $response = self::getHerlanCategoryList();
//
//        if (!isset($response['success']) || $response['success'] !== true) {
//            \Log::error('Failed to fetch Herlan categories', ['response' => $response]);
//            return [
//                'success' => false,
//                'message' => 'Failed to fetch categories from API',
//                'error' => $response['error'] ?? 'Unknown error'
//            ];
//        }
//        $syncResults = [
//            'created' => 0,
//            'updated' => 0,
//            'deleted' => 0,
//            'errors' => []
//        ];
//
//        try {
//            \DB::beginTransaction();
//
//            // Get all existing Herlan category IDs before sync
//            $existingHerlanIds = self::withTrashed()->pluck('herlan_cat_id')->toArray();
//            $processedHerlanIds = [];
//
//            // Process all categories recursively
//            foreach ($response['data'] as $herlanCategory) {
//                self::syncCategoryRecursive($herlanCategory, null, $processedHerlanIds, $syncResults);
//            }
//
//            // Soft delete categories that no longer exist in API
//            $deletedIds = array_diff($existingHerlanIds, $processedHerlanIds);
//            if (!empty($deletedIds)) {
//                $deleted = self::whereIn('herlan_cat_id', $deletedIds)
//                    ->whereNull('deleted_at')
//                    ->delete();
//                $syncResults['deleted'] = $deleted;
//            }
//
//            \DB::commit();
//
//            \Log::info('Product categories synced successfully', $syncResults);
//
//            return [
//                'success' => true,
//                'message' => 'Categories synced successfully',
//                'data' => $syncResults
//            ];
//
//        } catch (\Exception $e) {
//            \DB::rollBack();
//            \Log::error('Error syncing product categories', [
//                'error' => $e->getMessage(),
//                'trace' => $e->getTraceAsString()
//            ]);
//
//            return [
//                'success' => false,
//                'message' => 'Failed to sync categories',
//                'error' => $e->getMessage()
//            ];
//        }
//    }
//
//    private static function syncCategoryRecursive(
//        array $herlanCategory,
//        ?int $parentId,
//        array &$processedIds,
//        array &$syncResults
//    ): ?ProductCategory {
//        try {
//            // Track this category as processed
//            $processedIds[] = $herlanCategory['id'];
//
//            // Find existing category or create new one
//            $category = self::withTrashed()->updateOrCreate(
//                ['herlan_cat_id' => $herlanCategory['id']],
//                [
//                    'name' => $herlanCategory['name'],
//                    'slug' => $herlanCategory['slug'],
//                    'thumb_img' => $herlanCategory['image'] ?? null,
//                    'product_category_id' => $parentId,
//                    'herlan_cat_slug' => $herlanCategory['slug'],
//                    'herlan_cat_uri' => $herlanCategory['uri'] ?? null,
//                    'herlan_cat_total_products' => $herlanCategory['product_count'] ?? 0,
//                    'status' => 1, // Active by default
////                    'deleted_at' => null, // Restore if soft deleted
//                ]
//            );
//
//            // Track if created or updated
//            if ($category->wasRecentlyCreated) {
//                $syncResults['created']++;
//            } elseif ($category->wasChanged()) {
//                $syncResults['updated']++;
//            }
//
//            // Process subcategories recursively
//            if (isset($herlanCategory['sub_categories']) && is_array($herlanCategory['sub_categories'])) {
//                foreach ($herlanCategory['sub_categories'] as $subCategory) {
//                    self::syncCategoryRecursive(
//                        $subCategory,
//                        $category->id,
//                        $processedIds,
//                        $syncResults
//                    );
//                }
//            }
//
//            return $category;
//
//        } catch (\Exception $e) {
//            \Log::error('Error syncing individual category', [
//                'herlan_cat_id' => $herlanCategory['id'] ?? 'unknown',
//                'name' => $herlanCategory['name'] ?? 'unknown',
//                'error' => $e->getMessage()
//            ]);
//
//            $syncResults['errors'][] = [
//                'herlan_cat_id' => $herlanCategory['id'] ?? null,
//                'name' => $herlanCategory['name'] ?? null,
//                'error' => $e->getMessage()
//            ];
//
//            return null;
//        }
//    }
//
//    public function productCategory()
//    {
//        return $this->belongsTo(ProductCategory::class);
//    }
//
//    public function productCategories()
//    {
//        return $this->hasMany(ProductCategory::class);
//    }
//
//    /**
//     * Get all descendants (children, grandchildren, etc.)
//     */
//    public function descendants()
//    {
//        return $this->productCategories()->with('descendants');
//    }
//
//    /**
//     * Get all ancestors (parent, grandparent, etc.)
//     */
//    public function ancestors()
//    {
//        return $this->productCategory()->with('ancestors');
//    }
//
//    /**
//     * Check if category has children
//     */
//    public function hasproductCategories(): bool
//    {
//        return $this->productCategories()->exists();
//    }
//
//    /**
//     * Get category level/depth
//     */
//    public function getLevel(): int
//    {
//        $level = 0;
//        $productCategory = $this->productCategory;
//
//        while ($productCategory) {
//            $level++;
//            $productCategory = $productCategory->productCategory;
//        }
//
//        return $level;
//    }
//
//    /**
//     * Get breadcrumb path
//     */
//    public function getBreadcrumb(): array
//    {
//        $breadcrumb = [$this];
//        $productCategory = $this->productCategory;
//
//        while ($productCategory) {
//            array_unshift($breadcrumb, $productCategory);
//            $productCategory = $productCategory->productCategory;
//        }
//
//        return $breadcrumb;
//    }
//
//    /**
//     * Scope to get only root categories (no parent)
//     */
//    public function scopeRoots($query)
//    {
//        return $query->whereNull('product_category_id');
//    }
//
//    /**
//     * Scope to get only leaf categories (no children)
//     */
//    public function scopeLeaves($query)
//    {
//        return $query->doesntHave('productCategories');
//    }
//
//    public function products()
//    {
//        return $this->belongsToMany(Product::class);
//    }
//}
