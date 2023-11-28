<?php

namespace App\Policies;

use App\Models\User;
use App\Models\EmpresaAnexo;
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpresaAnexoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the empresaAnexo can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list empresaanexos');
    }

    /**
     * Determine whether the empresaAnexo can view the model.
     */
    public function view(User $user, EmpresaAnexo $model): bool
    {
        return $user->hasPermissionTo('view empresaanexos');
    }

    /**
     * Determine whether the empresaAnexo can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create empresaanexos');
    }

    /**
     * Determine whether the empresaAnexo can update the model.
     */
    public function update(User $user, EmpresaAnexo $model): bool
    {
        return $user->hasPermissionTo('update empresaanexos');
    }

    /**
     * Determine whether the empresaAnexo can delete the model.
     */
    public function delete(User $user, EmpresaAnexo $model): bool
    {
        return $user->hasPermissionTo('delete empresaanexos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete empresaanexos');
    }

    /**
     * Determine whether the empresaAnexo can restore the model.
     */
    public function restore(User $user, EmpresaAnexo $model): bool
    {
        return false;
    }

    /**
     * Determine whether the empresaAnexo can permanently delete the model.
     */
    public function forceDelete(User $user, EmpresaAnexo $model): bool
    {
        return false;
    }
}
