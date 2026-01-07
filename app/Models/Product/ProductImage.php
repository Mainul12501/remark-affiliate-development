<?php

namespace App\Models\Product;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'title',
        'src',
        'position',
        'img_alt',
        'status',
        'herlan_img_id',
        'herlan_img_src',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'product_images';

    public static function createOrUpdateProductImage($images, $product)
    {
        $imageIds = [];

        foreach ($images as $image) {

            $productImage = ProductImage::updateOrCreate(
                [
                    'herlan_img_id' => $image['id'],
                    'product_id'   => $product->id,
                ],
                [
                    'title'          => $image['name'] ?? '',
                    'src'            => $image['src'] ?? '',
                    'position'       => $image['position'] ?? 0,
                    'img_alt'        => $image['alt'] ?? '',
                    'status'         => 1,
                    'herlan_img_src' => $image['src'] ?? '',
                ]
            );

            $imageIds[] = $image['id'];

            /** Set thumbnail from first image */
            if (($image['position'] ?? 0) === 0) {
                $product->update(['thumb_img' => $image['src']]);
            }
        }

        /** Delete removed images */
        $product->images()
            ->whereNotIn('herlan_img_id', $imageIds)
            ->delete();
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
