<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BenefitListCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class BenefitListCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the benefitListCategory can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the benefitListCategory can view the model.
     */
    public function view(User $user, BenefitListCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the benefitListCategory can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the benefitListCategory can update the model.
     */
    public function update(User $user, BenefitListCategory $model): bool
    {
        return true;
    }

    /**
     * Determine whether the benefitListCategory can delete the model.
     */
    public function delete(User $user, BenefitListCategory $model): bool
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
     * Determine whether the benefitListCategory can restore the model.
     */
    public function restore(User $user, BenefitListCategory $model): bool
    {
        return false;
    }

    /**
     * Determine whether the benefitListCategory can permanently delete the model.
     */
    public function forceDelete(User $user, BenefitListCategory $model): bool
    {
        return false;
    }
}
