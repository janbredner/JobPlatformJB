<?php

namespace App\Policies;

use App\Models\JobTag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobTagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param JobTag $jobTag
     * @return mixed
     */
    public function view(User $user, JobTag $jobTag)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($user->email === "jan@web.de")
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param JobTag $jobTag
     * @return mixed
     */
    public function update(User $user, JobTag $jobTag)
    {
        if($user->email === "jan@web.de")
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param JobTag $jobTag
     * @return mixed
     */
    public function delete(User $user, JobTag $jobTag)
    {
        if($user->email === "jan@web.de")
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param JobTag $jobTag
     * @return mixed
     */
    public function restore(User $user, JobTag $jobTag)
    {
        if($user->email === "jan@web.de")
        {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param JobTag $jobTag
     * @return mixed
     */
    public function forceDelete(User $user, JobTag $jobTag)
    {
        if($user->email === "jan@web.de")
        {
            return true;
        }
        return false;
    }
}
