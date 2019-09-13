<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Elnooronline\LaravelConcerns\Models\Abstracts\Model;
use Elnooronline\LaravelConcerns\Models\Helpers\HasMediaTrait;

class Editor extends Model implements HasMedia
{
    use HasMediaTrait;
}
