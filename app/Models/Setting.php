<?php

namespace App\Models;

use Elnooronline\LaravelConcerns\Models\Helpers\HasMediaTrait;
use Laraeast\LaravelSettings\Models\Setting as SettingModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Setting extends SettingModel implements HasMedia
{
    use HasMediaTrait;
}
