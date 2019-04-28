<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\MediaLibrary\Models\Media;

class MediaController extends Controller
{
    /**
     * Delete the given media.
     *
     * @param \Spatie\MediaLibrary\Models\Media $media
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Media $media)
    {
        $this->authorize('delete', $media);

        $media->delete();
    }
}
