<?php

namespace App\Policies;

use App\Models\Disasters;
use App\Models\Users;
use Illuminate\Auth\Access\HandlesAuthorization;

class DisastersPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Users $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Users $user, Disasters $disasters)
    {
        return $user->id === $disasters->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Users $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Users $user, Disasters $disasters)
    {
        return $user->id === $disasters->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Users $user, Disasters $disasters)
    {
        return $user->id === $disasters->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Users $user, Disasters $disasters)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Disasters  $disasters
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Users $user, Disasters $disasters)
    {
        //
    }
}
