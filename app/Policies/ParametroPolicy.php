<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Parametro;
use Illuminate\Auth\Access\HandlesAuthorization;

class ParametroPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the parametro can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list parametros');
    }

    /**
     * Determine whether the parametro can view the model.
     */
    public function view(User $user, Parametro $model): bool
    {
        return $user->hasPermissionTo('view parametros');
    }

    /**
     * Determine whether the parametro can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create parametros');
    }

    /**
     * Determine whether the parametro can update the model.
     */
    public function update(User $user, Parametro $model): bool
    {
        return $user->hasPermissionTo('update parametros');
    }

    /**
     * Determine whether the parametro can delete the model.
     */
    public function delete(User $user, Parametro $model): bool
    {
        return $user->hasPermissionTo('delete parametros');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete parametros');
    }

    /**
     * Determine whether the parametro can restore the model.
     */
    public function restore(User $user, Parametro $model): bool
    {
        return false;
    }

    /**
     * Determine whether the parametro can permanently delete the model.
     */
    public function forceDelete(User $user, Parametro $model): bool
    {
        return false;
    }
}
