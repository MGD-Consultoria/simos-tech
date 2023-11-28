<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Fornecedor;
use Illuminate\Auth\Access\HandlesAuthorization;

class FornecedorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the fornecedor can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list fornecedores');
    }

    /**
     * Determine whether the fornecedor can view the model.
     */
    public function view(User $user, Fornecedor $model): bool
    {
        return $user->hasPermissionTo('view fornecedores');
    }

    /**
     * Determine whether the fornecedor can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create fornecedores');
    }

    /**
     * Determine whether the fornecedor can update the model.
     */
    public function update(User $user, Fornecedor $model): bool
    {
        return $user->hasPermissionTo('update fornecedores');
    }

    /**
     * Determine whether the fornecedor can delete the model.
     */
    public function delete(User $user, Fornecedor $model): bool
    {
        return $user->hasPermissionTo('delete fornecedores');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete fornecedores');
    }

    /**
     * Determine whether the fornecedor can restore the model.
     */
    public function restore(User $user, Fornecedor $model): bool
    {
        return false;
    }

    /**
     * Determine whether the fornecedor can permanently delete the model.
     */
    public function forceDelete(User $user, Fornecedor $model): bool
    {
        return false;
    }
}
