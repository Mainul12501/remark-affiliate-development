<?php

namespace App\Policies;

use App\Models\User;
use App\Models\BenefitList;
use Illuminate\Auth\Access\HandlesAuthorization;

class BenefitListPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the benefitList can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the benefitList can view the model.
     */
    public function view(User $user, BenefitList $model): bool
    {
        return true;
    }

    /**
     * Determine whether the benefitList can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the benefitList can update the model.
     */
    public function update(User $user, BenefitList $model): bool
    {
        return true;
    }

    /**
     * Determine whether the benefitList can delete the model.
     */
    public function delete(User $user, BenefitList $model): bool
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
     * Determine whether the benefitList can restore the model.
     */
    public function restore(User $user, BenefitList $model): bool
    {
        return false;
    }

    /**
     * Determine whether the benefitList can permanently delete the model.
     */
    public function forceDelete(User $user, BenefitList $model): bool
    {
        return false;
    }
}
