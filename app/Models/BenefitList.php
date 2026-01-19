<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BenefitList extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'benefit_list_category_id',
        'brand_title',
        'amount',
        'status',
        'slug',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'benefit_lists';

    public static function createOrUpdateBenefit($request, $benefitList = null)
    {
        return static::updateOrCreate(['id' => $benefitList?->id], [
            'benefit_list_category_id'  => $request->benefit_list_category_id,
            'brand_title'               => $request->brand_title ?? '',
            'amount'                    => $request->amount ?? 0,
            'status'                    => $request->status == 'on' ? 1 : 0,
            'slug'                      => str()->slug($request->name ?? ''),
        ]);
    }

    public function benefitListCategory()
    {
        return $this->belongsTo(BenefitListCategory::class);
    }
}
