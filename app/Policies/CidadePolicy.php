<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cidade;
use Illuminate\Auth\Access\HandlesAuthorization;

class CidadePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the cidade can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list cidades');
    }

    /**
     * Determine whether the cidade can view the model.
     */
    public function view(User $user, Cidade $model): bool
    {
        return $user->hasPermissionTo('view cidades');
    }

    /**
     * Determine whether the cidade can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create cidades');
    }

    /**
     * Determine whether the cidade can update the model.
     */
    public function update(User $user, Cidade $model): bool
    {
        return $user->hasPermissionTo('update cidades');
    }

    /**
     * Determine whether the cidade can delete the model.
     */
    public function delete(User $user, Cidade $model): bool
    {
        return $user->hasPermissionTo('delete cidades');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete cidades');
    }

    /**
     * Determine whether the cidade can restore the model.
     */
    public function restore(User $user, Cidade $model): bool
    {
        return false;
    }

    /**
     * Determine whether the cidade can permanently delete the model.
     */
    public function forceDelete(User $user, Cidade $model): bool
    {
        return false;
    }
}
