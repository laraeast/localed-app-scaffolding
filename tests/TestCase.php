<?php

namespace Tests;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->app->setLocale('en');
    }

    /**
     * Create an admin instance.
     *
     * @return \App\Models\Admin
     */
    public function createAdmin()
    {
        return factory(Admin::class)->create();
    }

    /**
     * Create a user instance.
     *
     * @return \App\Models\User
     */
    public function createUser()
    {
        return factory(User::class)->create();
    }
}
