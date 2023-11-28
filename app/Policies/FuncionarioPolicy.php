<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Funcionario;
use Illuminate\Auth\Access\HandlesAuthorization;

class FuncionarioPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the funcionario can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list funcionarios');
    }

    /**
     * Determine whether the funcionario can view the model.
     */
    public function view(User $user, Funcionario $model): bool
    {
        return $user->hasPermissionTo('view funcionarios');
    }

    /**
     * Determine whether the funcionario can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create funcionarios');
    }

    /**
     * Determine whether the funcionario can update the model.
     */
    public function update(User $user, Funcionario $model): bool
    {
        return $user->hasPermissionTo('update funcionarios');
    }

    /**
     * Determine whether the funcionario can delete the model.
     */
    public function delete(User $user, Funcionario $model): bool
    {
        return $user->hasPermissionTo('delete funcionarios');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete funcionarios');
    }

    /**
     * Determine whether the funcionario can restore the model.
     */
    public function restore(User $user, Funcionario $model): bool
    {
        return false;
    }

    /**
     * Determine whether the funcionario can permanently delete the model.
     */
    public function forceDelete(User $user, Funcionario $model): bool
    {
        return false;
    }
}
