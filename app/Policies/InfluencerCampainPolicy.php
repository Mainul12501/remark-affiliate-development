<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Campaigns\InfluencerCampain;
use Illuminate\Auth\Access\HandlesAuthorization;

class InfluencerCampainPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the influencerCampain can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the influencerCampain can view the model.
     */
    public function view(User $user, InfluencerCampain $model): bool
    {
        return true;
    }

    /**
     * Determine whether the influencerCampain can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the influencerCampain can update the model.
     */
    public function update(User $user, InfluencerCampain $model): bool
    {
        return true;
    }

    /**
     * Determine whether the influencerCampain can delete the model.
     */
    public function delete(User $user, InfluencerCampain $model): bool
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
     * Determine whether the influencerCampain can restore the model.
     */
    public function restore(User $user, InfluencerCampain $model): bool
    {
        return false;
    }

    /**
     * Determine whether the influencerCampain can permanently delete the model.
     */
    public function forceDelete(User $user, InfluencerCampain $model): bool
    {
        return false;
    }
}
