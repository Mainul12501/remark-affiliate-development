<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product\ProductCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the productCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the productCategory can view the model.
     */
    public function view(User $user, ProductCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the productCategory can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the productCategory can update the model.
     */
    public function update(User $user, ProductCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the productCategory can delete the model.
     */
    public function delete(User $user, ProductCategory $model): bool
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
     * Determine whether the productCategory can restore the model.
     */
    public function restore(User $user, ProductCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the productCategory can permanently delete the model.
     */
    public function forceDelete(User $user, ProductCategory $model): bool
    {
        return false;
    }
}
