<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Norma;
use Illuminate\Auth\Access\HandlesAuthorization;

class NormaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the norma can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list normas');
    }

    /**
     * Determine whether the norma can view the model.
     */
    public function view(User $user, Norma $model): bool
    {
        return $user->hasPermissionTo('view normas');
    }

    /**
     * Determine whether the norma can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create normas');
    }

    /**
     * Determine whether the norma can update the model.
     */
    public function update(User $user, Norma $model): bool
    {
        return $user->hasPermissionTo('update normas');
    }

    /**
     * Determine whether the norma can delete the model.
     */
    public function delete(User $user, Norma $model): bool
    {
        return $user->hasPermissionTo('delete normas');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete normas');
    }

    /**
     * Determine whether the norma can restore the model.
     */
    public function restore(User $user, Norma $model): bool
    {
        return false;
    }

    /**
     * Determine whether the norma can permanently delete the model.
     */
    public function forceDelete(User $user, Norma $model): bool
    {
        return false;
    }
}
