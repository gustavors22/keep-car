<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Piece;
use Illuminate\Auth\Access\HandlesAuthorization;

class PiecePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the piece can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the piece can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Piece  $model
     * @return mixed
     */
    public function view(User $user, Piece $model)
    {
        return true;
    }

    /**
     * Determine whether the piece can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the piece can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Piece  $model
     * @return mixed
     */
    public function update(User $user, Piece $model)
    {
        return true;
    }

    /**
     * Determine whether the piece can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Piece  $model
     * @return mixed
     */
    public function delete(User $user, Piece $model)
    {
        return true;
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Piece  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the piece can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Piece  $model
     * @return mixed
     */
    public function restore(User $user, Piece $model)
    {
        return false;
    }

    /**
     * Determine whether the piece can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Piece  $model
     * @return mixed
     */
    public function forceDelete(User $user, Piece $model)
    {
        return false;
    }
}
