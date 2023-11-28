<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Equipamento;
use Illuminate\Auth\Access\HandlesAuthorization;

class EquipamentoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the equipamento can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list equipamentos');
    }

    /**
     * Determine whether the equipamento can view the model.
     */
    public function view(User $user, Equipamento $model): bool
    {
        return $user->hasPermissionTo('view equipamentos');
    }

    /**
     * Determine whether the equipamento can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create equipamentos');
    }

    /**
     * Determine whether the equipamento can update the model.
     */
    public function update(User $user, Equipamento $model): bool
    {
        return $user->hasPermissionTo('update equipamentos');
    }

    /**
     * Determine whether the equipamento can delete the model.
     */
    public function delete(User $user, Equipamento $model): bool
    {
        return $user->hasPermissionTo('delete equipamentos');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete equipamentos');
    }

    /**
     * Determine whether the equipamento can restore the model.
     */
    public function restore(User $user, Equipamento $model): bool
    {
        return false;
    }

    /**
     * Determine whether the equipamento can permanently delete the model.
     */
    public function forceDelete(User $user, Equipamento $model): bool
    {
        return false;
    }
}
