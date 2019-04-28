<?php

namespace App\Models\Helpers;

use App\Models\User;

trait UserHelpers
{
    /**
     * Determine whether the user is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->getAttribute('type') === User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user has ability to access dashboard.
     *
     * @return bool
     */
    public function canAccessDashboard()
    {
        return $this->isAdmin();
    }

    /**
     * Get the user avatar image.
     * @return string
     */
    public function getAvatar()
    {
        return $this->getFirstMediaUrl() ?: get_gravatar($this->email);
    }
}
