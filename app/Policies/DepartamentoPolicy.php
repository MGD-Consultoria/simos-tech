<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Departamento;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartamentoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the departamento can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list departamentos');
    }

    /**
     * Determine whether the departamento can view the model.
     */
    public function view(User $user, Departamento $model): bool
    {
        return $user->hasPermissionTo('view departamentos');
    }

    /**
     * Determine whether the departamento can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create departamentos');
    }

    /**
     * Determine whether the departamento can update the model.
     */
    public function update(User $user, Departamento $model): bool
    {
        return $user->hasPermissionTo('update departamentos');
    }

    /**
     * Determine whether the departamento can delete the model.
     */
    public function delete(User $user, Departamento $model): bool
    {
        return $user->hasPermissionTo('delete departamentos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete departamentos');
    }

    /**
     * Determine whether the departamento can restore the model.
     */
    public function restore(User $user, Departamento $model): bool
    {
        return false;
    }

    /**
     * Determine whether the departamento can permanently delete the model.
     */
    public function forceDelete(User $user, Departamento $model): bool
    {
        return false;
    }
}
