<?php

namespace App\Models;

use App\Models\Presenters\DashboardPresenter;
use Elnooronline\LaravelConcerns\Models\Abstracts\Model;

class Feedback extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'message',
    ];

    /**
     * The presenter class name.
     *
     * @var string
     */
    protected $presenter = DashboardPresenter::class;

    /**
     * Mark message as readed.
     *
     * @return $this
     */
    public function markAsRead()
    {
        $this->forceFill(['readed_at' => now()])->save();

        return $this->refresh();
    }

    /**
     * Determine whether the message is readed.
     *
     * @return bool
     */
    public function isReaded()
    {
        return ! ! $this->getAttribute('readed_at');
    }
}
