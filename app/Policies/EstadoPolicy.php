<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Estado;
use Illuminate\Auth\Access\HandlesAuthorization;

class EstadoPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the estado can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list estados');
    }

    /**
     * Determine whether the estado can view the model.
     */
    public function view(User $user, Estado $model): bool
    {
        return $user->hasPermissionTo('view estados');
    }

    /**
     * Determine whether the estado can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create estados');
    }

    /**
     * Determine whether the estado can update the model.
     */
    public function update(User $user, Estado $model): bool
    {
        return $user->hasPermissionTo('update estados');
    }

    /**
     * Determine whether the estado can delete the model.
     */
    public function delete(User $user, Estado $model): bool
    {
        return $user->hasPermissionTo('delete estados');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete estados');
    }

    /**
     * Determine whether the estado can restore the model.
     */
    public function restore(User $user, Estado $model): bool
    {
        return false;
    }

    /**
     * Determine whether the estado can permanently delete the model.
     */
    public function forceDelete(User $user, Estado $model): bool
    {
        return false;
    }
}
