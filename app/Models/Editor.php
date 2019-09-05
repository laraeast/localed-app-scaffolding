<?php

namespace App\Models;

use Elnooronline\LaravelConcerns\Models\Abstracts\Model;
use Elnooronline\LaravelConcerns\Models\Helpers\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Editor extends Model implements HasMedia
{
    use HasMediaTrait;
}
