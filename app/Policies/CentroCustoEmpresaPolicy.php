<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CentroCustoEmpresa;
use Illuminate\Auth\Access\HandlesAuthorization;

class CentroCustoEmpresaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the centroCustoEmpresa can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list centrocustoempresas');
    }

    /**
     * Determine whether the centroCustoEmpresa can view the model.
     */
    public function view(User $user, CentroCustoEmpresa $model): bool
    {
        return $user->hasPermissionTo('view centrocustoempresas');
    }

    /**
     * Determine whether the centroCustoEmpresa can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create centrocustoempresas');
    }

    /**
     * Determine whether the centroCustoEmpresa can update the model.
     */
    public function update(User $user, CentroCustoEmpresa $model): bool
    {
        return $user->hasPermissionTo('update centrocustoempresas');
    }

    /**
     * Determine whether the centroCustoEmpresa can delete the model.
     */
    public function delete(User $user, CentroCustoEmpresa $model): bool
    {
        return $user->hasPermissionTo('delete centrocustoempresas');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete centrocustoempresas');
    }

    /**
     * Determine whether the centroCustoEmpresa can restore the model.
     */
    public function restore(User $user, CentroCustoEmpresa $model): bool
    {
        return false;
    }

    /**
     * Determine whether the centroCustoEmpresa can permanently delete the model.
     */
    public function forceDelete(User $user, CentroCustoEmpresa $model): bool
    {
        return false;
    }
}
