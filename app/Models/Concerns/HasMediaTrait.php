<?php

namespace App\Models\Concerns;

use App\Http\Resources\MediaResource;

trait HasMediaTrait
{
    use \Elnooronline\LaravelConcerns\Models\Helpers\HasMediaTrait;

    /**
     * Get the media resource.
     *
     * @param string $collection
     * @return array
     */
    public function getMediaResource($collection = 'default')
    {
        return MediaResource::collection($this->getMedia($collection))->toArray(request());
    }
}
