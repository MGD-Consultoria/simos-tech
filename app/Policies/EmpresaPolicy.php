<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Empresa;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the empresa can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list empresas');
    }

    /**
     * Determine whether the empresa can view the model.
     */
    public function view(User $user, Empresa $model): bool
    {
        return $user->hasPermissionTo('view empresas');
    }

    /**
     * Determine whether the empresa can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create empresas');
    }

    /**
     * Determine whether the empresa can update the model.
     */
    public function update(User $user, Empresa $model): bool
    {
        return $user->hasPermissionTo('update empresas');
    }

    /**
     * Determine whether the empresa can delete the model.
     */
    public function delete(User $user, Empresa $model): bool
    {
        return $user->hasPermissionTo('delete empresas');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete empresas');
    }

    /**
     * Determine whether the empresa can restore the model.
     */
    public function restore(User $user, Empresa $model): bool
    {
        return false;
    }

    /**
     * Determine whether the empresa can permanently delete the model.
     */
    public function forceDelete(User $user, Empresa $model): bool
    {
        return false;
    }
}
