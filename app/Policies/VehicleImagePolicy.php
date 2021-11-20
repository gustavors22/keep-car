<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VehicleImage;
use Illuminate\Auth\Access\HandlesAuthorization;

class VehicleImagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the vehicleImage can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the vehicleImage can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VehicleImage  $model
     * @return mixed
     */
    public function view(User $user, VehicleImage $model)
    {
        return true;
    }

    /**
     * Determine whether the vehicleImage can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the vehicleImage can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VehicleImage  $model
     * @return mixed
     */
    public function update(User $user, VehicleImage $model)
    {
        return true;
    }

    /**
     * Determine whether the vehicleImage can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VehicleImage  $model
     * @return mixed
     */
    public function delete(User $user, VehicleImage $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VehicleImage  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the vehicleImage can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VehicleImage  $model
     * @return mixed
     */
    public function restore(User $user, VehicleImage $model)
    {
        return false;
    }

    /**
     * Determine whether the vehicleImage can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\VehicleImage  $model
     * @return mixed
     */
    public function forceDelete(User $user, VehicleImage $model)
    {
        return false;
    }
}
