<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Product\ProductCommissionRate;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCommissionRatePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the productCommissionRate can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the productCommissionRate can view the model.
     */
    public function view(User $user, ProductCommissionRate $model): bool
    {
        return true;
    }

    /**
     * Determine whether the productCommissionRate can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the productCommissionRate can update the model.
     */
    public function update(User $user, ProductCommissionRate $model): bool
    {
        return true;
    }

    /**
     * Determine whether the productCommissionRate can delete the model.
     */
    public function delete(User $user, ProductCommissionRate $model): bool
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
     * Determine whether the productCommissionRate can restore the model.
     */
    public function restore(User $user, ProductCommissionRate $model): bool
    {
        return false;
    }

    /**
     * Determine whether the productCommissionRate can permanently delete the model.
     */
    public function forceDelete(User $user, ProductCommissionRate $model): bool
    {
        return false;
    }
}
