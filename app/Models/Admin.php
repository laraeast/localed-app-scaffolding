<?php

namespace App\Models;

use App\Models\Presenters\DashboardPresenter;
use Elnooronline\LaravelConcerns\Models\Concerns\SingleTableInheritance;
use Elnooronline\LaravelConcerns\Models\Scopes\UserTypeScope;

class Admin extends User
{
    use SingleTableInheritance;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The type of the current model for single table inheritance.
     *
     * @var string
     */
    protected $modelType = 'admin';

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
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = [
        'media',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new UserTypeScope(static::ADMIN_TYPE));
    }
}
