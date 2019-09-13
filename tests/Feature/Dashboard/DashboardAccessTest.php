<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardAccessTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function only_admin_can_access_dashboard()
    {
        $this->be($this->createUser());

        $response = $this->get(route('dashboard.home'));

        $response->assertForbidden();

        $this->be($this->createAdmin());

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();
    }
}
