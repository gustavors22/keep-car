<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehiclePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the vehicle can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the vehicle can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vehicle  $model
     * @return mixed
     */
    public function view(User $user, Vehicle $model)
    {
        return true;
    }

    /**
     * Determine whether the vehicle can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the vehicle can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vehicle  $model
     * @return mixed
     */
    public function update(User $user, Vehicle $model)
    {
        return true;
    }

    /**
     * Determine whether the vehicle can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vehicle  $model
     * @return mixed
     */
    public function delete(User $user, Vehicle $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vehicle  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the vehicle can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vehicle  $model
     * @return mixed
     */
    public function restore(User $user, Vehicle $model)
    {
        return false;
    }

    /**
     * Determine whether the vehicle can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Vehicle  $model
     * @return mixed
     */
    public function forceDelete(User $user, Vehicle $model)
    {
        return false;
    }
}
