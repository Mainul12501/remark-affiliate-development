<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class BenefitListCategory extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'created_by',
        'deleted_by',
        'user_type',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'benefit_list_categories';

    public static function createOrUpdateCategory($request, $category = null)
    {
        return static::updateOrCreate(['id' => $category?->id], [
            'title'             => $request->title,
            'slug'              => str()->slug($request->name),
            'status'            => $request->status == 'on' ? 1 : 0,
            'created_by'        => CustomHelper::loggedUser()->id,
            'user_type'         => $request->user_type,
        ]);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function benefitLists()
    {
        return $this->hasMany(BenefitList::class);
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
