<?php

namespace App\Policies;

use App\Models\User;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Auth\Access\HandlesAuthorization;

class MediaPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can delete the media.
     *
     * @param  \App\Models\User  $user
     * @param  \Spatie\MediaLibrary\Models\Media  $media
     * @return mixed
     */
    public function delete(User $user, Media $media)
    {
        return $user->isAdmin();
    }
}
