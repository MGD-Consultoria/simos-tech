<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Filho;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilhoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the filho can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list filhos');
    }

    /**
     * Determine whether the filho can view the model.
     */
    public function view(User $user, Filho $model): bool
    {
        return $user->hasPermissionTo('view filhos');
    }

    /**
     * Determine whether the filho can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create filhos');
    }

    /**
     * Determine whether the filho can update the model.
     */
    public function update(User $user, Filho $model): bool
    {
        return $user->hasPermissionTo('update filhos');
    }

    /**
     * Determine whether the filho can delete the model.
     */
    public function delete(User $user, Filho $model): bool
    {
        return $user->hasPermissionTo('delete filhos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete filhos');
    }

    /**
     * Determine whether the filho can restore the model.
     */
    public function restore(User $user, Filho $model): bool
    {
        return false;
    }

    /**
     * Determine whether the filho can permanently delete the model.
     */
    public function forceDelete(User $user, Filho $model): bool
    {
        return false;
    }
}
