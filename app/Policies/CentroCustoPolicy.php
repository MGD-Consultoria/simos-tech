<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CentroCusto;
use Illuminate\Auth\Access\HandlesAuthorization;

class CentroCustoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the centroCusto can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list centrocustos');
    }

    /**
     * Determine whether the centroCusto can view the model.
     */
    public function view(User $user, CentroCusto $model): bool
    {
        return $user->hasPermissionTo('view centrocustos');
    }

    /**
     * Determine whether the centroCusto can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create centrocustos');
    }

    /**
     * Determine whether the centroCusto can update the model.
     */
    public function update(User $user, CentroCusto $model): bool
    {
        return $user->hasPermissionTo('update centrocustos');
    }

    /**
     * Determine whether the centroCusto can delete the model.
     */
    public function delete(User $user, CentroCusto $model): bool
    {
        return $user->hasPermissionTo('delete centrocustos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete centrocustos');
    }

    /**
     * Determine whether the centroCusto can restore the model.
     */
    public function restore(User $user, CentroCusto $model): bool
    {
        return false;
    }

    /**
     * Determine whether the centroCusto can permanently delete the model.
     */
    public function forceDelete(User $user, CentroCusto $model): bool
    {
        return false;
    }
}
