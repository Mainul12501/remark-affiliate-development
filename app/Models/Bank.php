<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Mainul\CustomHelperFunctions\Helpers\CustomHelper;

class Bank extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = ['created_by', 'name', 'logo', 'status', 'slug'];

    protected $searchableFields = ['*'];

    public static function createOrUpdateBank($request, $existBank = null)
    {
        return static::updateOrCreate(['id' => $existBank?->id], [
            'created_by'    => $existBank?->created_by ?? auth()->id() ,
            'name'          => $request->name,
            'logo'          => CustomHelper::fileUpload($request->file('logo'), 'bank', 'bank', 400, 250, $existBank?->logo ?? null),
            'slug'          => $request->slug,
            'status'        => $request->status ?? 1,
        ]);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function userBankInfos()
    {
        return $this->hasMany(UserBankInfo::class);
    }
}
