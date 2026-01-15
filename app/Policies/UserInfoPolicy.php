<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserInfoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the userInfo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the userInfo can view the model.
     */
    public function view(User $user, UserInfo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the userInfo can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the userInfo can update the model.
     */
    public function update(User $user, UserInfo $model): bool
    {
        return true;
    }

    /**
     * Determine whether the userInfo can delete the model.
     */
    public function delete(User $user, UserInfo $model): bool
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
     * Determine whether the userInfo can restore the model.
     */
    public function restore(User $user, UserInfo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the userInfo can permanently delete the model.
     */
    public function forceDelete(User $user, UserInfo $model): bool
    {
        return false;
    }
}
