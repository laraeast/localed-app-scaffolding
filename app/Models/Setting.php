<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Laraeast\LaravelSettings\Models\Setting as SettingModel;
use Elnooronline\LaravelConcerns\Models\Helpers\HasMediaTrait;

class Setting extends SettingModel implements HasMedia
{
    use HasMediaTrait;
}
