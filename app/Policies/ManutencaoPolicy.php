<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Manutencao;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManutencaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the manutencao can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list manutencoes');
    }

    /**
     * Determine whether the manutencao can view the model.
     */
    public function view(User $user, Manutencao $model): bool
    {
        return $user->hasPermissionTo('view manutencoes');
    }

    /**
     * Determine whether the manutencao can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create manutencoes');
    }

    /**
     * Determine whether the manutencao can update the model.
     */
    public function update(User $user, Manutencao $model): bool
    {
        return $user->hasPermissionTo('update manutencoes');
    }

    /**
     * Determine whether the manutencao can delete the model.
     */
    public function delete(User $user, Manutencao $model): bool
    {
        return $user->hasPermissionTo('delete manutencoes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete manutencoes');
    }

    /**
     * Determine whether the manutencao can restore the model.
     */
    public function restore(User $user, Manutencao $model): bool
    {
        return false;
    }

    /**
     * Determine whether the manutencao can permanently delete the model.
     */
    public function forceDelete(User $user, Manutencao $model): bool
    {
        return false;
    }
}
