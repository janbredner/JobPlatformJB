<?php

namespace App\Policies;

use App\Models\Job;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class JobPolicy
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
     * @param Job $job
     * @return mixed
     */
    public function view(User $user, Job $job)
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
        //check user_id-company_id
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Job $job
     * @return mixed
     */
    public function update(User $user, Job $job)
    {
        return $user->id === $job->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Job $job
     * @return mixed
     */
    public function delete(User $user, Job $job)
    {
        return $user->id === $job->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Job $job
     * @return mixed
     */
    public function restore(User $user, Job $job)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Job $job
     * @return mixed
     */
    public function forceDelete(User $user, Job $job)
    {
        return false;
    }
}
