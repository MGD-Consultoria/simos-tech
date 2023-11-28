<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Sensor;
use Illuminate\Auth\Access\HandlesAuthorization;

class SensorPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the sensor can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('list sensores');
    }

    /**
     * Determine whether the sensor can view the model.
     */
    public function view(User $user, Sensor $model): bool
    {
        return $user->hasPermissionTo('view sensores');
    }

    /**
     * Determine whether the sensor can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create sensores');
    }

    /**
     * Determine whether the sensor can update the model.
     */
    public function update(User $user, Sensor $model): bool
    {
        return $user->hasPermissionTo('update sensores');
    }

    /**
     * Determine whether the sensor can delete the model.
     */
    public function delete(User $user, Sensor $model): bool
    {
        return $user->hasPermissionTo('delete sensores');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('delete sensores');
    }

    /**
     * Determine whether the sensor can restore the model.
     */
    public function restore(User $user, Sensor $model): bool
    {
        return false;
    }

    /**
     * Determine whether the sensor can permanently delete the model.
     */
    public function forceDelete(User $user, Sensor $model): bool
    {
        return false;
    }
}
