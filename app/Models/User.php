<?php

namespace App\Models;

use App\Models\Helpers\UserHelpers;
use App\Models\Presenters\DashboardPresenter;
use Elnooronline\LaravelConcerns\Models\Abstracts\Authenticatable;
use Elnooronline\LaravelConcerns\Models\Concerns\SingleTableInheritance;
use Elnooronline\LaravelConcerns\Models\Helpers\HasMediaTrait;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use Notifiable,
        UserHelpers,
        HasApiTokens,
        HasMediaTrait,
        SingleTableInheritance;

    /**
     * The code of normal user type.
     */
    const USER_TYPE = 'user';

    /**
     * The code of admin type.
     */
    const ADMIN_TYPE = 'admin';

    /**
     * The type of the current model for single table inheritance.
     *
     * @var string
     */
    protected $modelType = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = DashboardPresenter::class;

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'media',
    ];
}
