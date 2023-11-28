<?php

namespace App\Policies;

use App\Models\User;
use App\Models\FuncionarioAnexo;
use Illuminate\Auth\Access\HandlesAuthorization;

class FuncionarioAnexoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the funcionarioAnexo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list funcionarioanexos');
    }

    /**
     * Determine whether the funcionarioAnexo can view the model.
     */
    public function view(User $user, FuncionarioAnexo $model): bool
    {
        return $user->hasPermissionTo('view funcionarioanexos');
    }

    /**
     * Determine whether the funcionarioAnexo can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create funcionarioanexos');
    }

    /**
     * Determine whether the funcionarioAnexo can update the model.
     */
    public function update(User $user, FuncionarioAnexo $model): bool
    {
        return $user->hasPermissionTo('update funcionarioanexos');
    }

    /**
     * Determine whether the funcionarioAnexo can delete the model.
     */
    public function delete(User $user, FuncionarioAnexo $model): bool
    {
        return $user->hasPermissionTo('delete funcionarioanexos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete funcionarioanexos');
    }

    /**
     * Determine whether the funcionarioAnexo can restore the model.
     */
    public function restore(User $user, FuncionarioAnexo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the funcionarioAnexo can permanently delete the model.
     */
    public function forceDelete(User $user, FuncionarioAnexo $model): bool
    {
        return false;
    }
}
