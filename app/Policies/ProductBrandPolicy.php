<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product\ProductBrand;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductBrandPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the productBrand can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the productBrand can view the model.
     */
    public function view(User $user, ProductBrand $model): bool
    {
        return true;
    }

    /**
     * Determine whether the productBrand can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the productBrand can update the model.
     */
    public function update(User $user, ProductBrand $model): bool
    {
        return true;
    }

    /**
     * Determine whether the productBrand can delete the model.
     */
    public function delete(User $user, ProductBrand $model): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the productBrand can restore the model.
     */
    public function restore(User $user, ProductBrand $model): bool
    {
        return false;
    }

    /**
     * Determine whether the productBrand can permanently delete the model.
     */
    public function forceDelete(User $user, ProductBrand $model): bool
    {
        return false;
    }
}
