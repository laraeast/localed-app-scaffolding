<?php

namespace App\Policies;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedbackPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any feedback.
     *
     * @param \App\Models\User $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the feedback.
     *
     * @param \App\Models\User     $user
     * @param \App\Models\Feedback $feedback
     *
     * @return bool
     */
    public function view(User $user, Feedback $feedback)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can create feedback.
     *
     * @param \App\Models\User $user
     *
     * @return bool
     */
    public function create(?User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can delete the feedback.
     *
     * @param \App\Models\User     $user
     * @param \App\Models\Feedback $feedback
     *
     * @return bool
     */
    public function delete(User $user, Feedback $feedback)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the feedback.
     *
     * @param \App\Models\User     $user
     * @param \App\Models\Feedback $feedback
     *
     * @return bool
     */
    public function restore(User $user, Feedback $feedback)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can permanently delete the feedback.
     *
     * @param \App\Models\User     $user
     * @param \App\Models\Feedback $feedback
     *
     * @return bool
     */
    public function forceDelete(User $user, Feedback $feedback)
    {
        return $user->isAdmin();
    }
}
