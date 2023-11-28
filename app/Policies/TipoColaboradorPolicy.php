<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TipoColaborador;
use Illuminate\Auth\Access\HandlesAuthorization;

class TipoColaboradorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the tipoColaborador can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list tipocolaboradores');
    }

    /**
     * Determine whether the tipoColaborador can view the model.
     */
    public function view(User $user, TipoColaborador $model): bool
    {
        return $user->hasPermissionTo('view tipocolaboradores');
    }

    /**
     * Determine whether the tipoColaborador can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create tipocolaboradores');
    }

    /**
     * Determine whether the tipoColaborador can update the model.
     */
    public function update(User $user, TipoColaborador $model): bool
    {
        return $user->hasPermissionTo('update tipocolaboradores');
    }

    /**
     * Determine whether the tipoColaborador can delete the model.
     */
    public function delete(User $user, TipoColaborador $model): bool
    {
        return $user->hasPermissionTo('delete tipocolaboradores');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete tipocolaboradores');
    }

    /**
     * Determine whether the tipoColaborador can restore the model.
     */
    public function restore(User $user, TipoColaborador $model): bool
    {
        return false;
    }

    /**
     * Determine whether the tipoColaborador can permanently delete the model.
     */
    public function forceDelete(User $user, TipoColaborador $model): bool
    {
        return false;
    }
}
