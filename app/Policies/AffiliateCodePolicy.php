<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Campaigns\AffiliateCode;
use Illuminate\Auth\Access\HandlesAuthorization;

class AffiliateCodePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the affiliateCode can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the affiliateCode can view the model.
     */
    public function view(User $user, AffiliateCode $model): bool
    {
        return true;
    }

    /**
     * Determine whether the affiliateCode can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the affiliateCode can update the model.
     */
    public function update(User $user, AffiliateCode $model): bool
    {
        return true;
    }

    /**
     * Determine whether the affiliateCode can delete the model.
     */
    public function delete(User $user, AffiliateCode $model): bool
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
     * Determine whether the affiliateCode can restore the model.
     */
    public function restore(User $user, AffiliateCode $model): bool
    {
        return false;
    }

    /**
     * Determine whether the affiliateCode can permanently delete the model.
     */
    public function forceDelete(User $user, AffiliateCode $model): bool
    {
        return false;
    }
}
