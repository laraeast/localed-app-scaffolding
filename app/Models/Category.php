<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use App\Models\Presenters\DashboardPresenter;
use App\Models\Relationship\CategoryRelation;
use Elnooronline\LaravelConcerns\Models\Abstracts\Model;

class Category extends Model
{
    use Translatable, CategoryRelation;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mame',
    ];

    /**
     * The translated attributes that are mass assignable.
     *
     * @var array
     */
    public $translatedAttributes = ['name'];

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
        'translations',
    ];
}
