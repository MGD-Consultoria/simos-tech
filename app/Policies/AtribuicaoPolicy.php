<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Atribuicao;
use Illuminate\Auth\Access\HandlesAuthorization;

class AtribuicaoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the atribuicao can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list atribuicoes');
    }

    /**
     * Determine whether the atribuicao can view the model.
     */
    public function view(User $user, Atribuicao $model): bool
    {
        return $user->hasPermissionTo('view atribuicoes');
    }

    /**
     * Determine whether the atribuicao can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create atribuicoes');
    }

    /**
     * Determine whether the atribuicao can update the model.
     */
    public function update(User $user, Atribuicao $model): bool
    {
        return $user->hasPermissionTo('update atribuicoes');
    }

    /**
     * Determine whether the atribuicao can delete the model.
     */
    public function delete(User $user, Atribuicao $model): bool
    {
        return $user->hasPermissionTo('delete atribuicoes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete atribuicoes');
    }

    /**
     * Determine whether the atribuicao can restore the model.
     */
    public function restore(User $user, Atribuicao $model): bool
    {
        return false;
    }

    /**
     * Determine whether the atribuicao can permanently delete the model.
     */
    public function forceDelete(User $user, Atribuicao $model): bool
    {
        return false;
    }
}
