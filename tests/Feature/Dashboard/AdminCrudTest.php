<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\User;
use App\Models\Admin;
use Tests\Support\HasValidation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCrudTest extends TestCase
{
    use RefreshDatabase, HasValidation;

    /** @test */
    public function it_can_see_admin_link_in_sidebar()
    {
        $this->be($this->createAdmin());

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();

        $response->assertSee(e(trans('admins.plural')));
    }

    /** @test */
    public function it_can_list_admins()
    {
        $this->be($this->createAdmin());

        $admin = factory(Admin::class)->create();

        $response = $this->get(route('dashboard.admins.index'));

        $response->assertSuccessful();

        $response->assertSee(e($admin->name));

        $response->assertViewIs('dashboard.admins.index');
    }

    /** @test */
    public function it_can_display_admin_details()
    {
        $this->be($this->createAdmin());

        $admin = factory(Admin::class)->create();

        $response = $this->get(route('dashboard.admins.show', $admin));

        $response->assertSuccessful();

        $response->assertSee(e($admin->name));

        $response->assertViewIs('dashboard.admins.show');
    }

    /** @test */
    public function it_can_display_create_admin_form()
    {
        $this->be($this->createAdmin());

        $response = $this->get(route('dashboard.admins.create'));

        $response->assertSuccessful();

        $response->assertViewIs('dashboard.admins.create');
    }

    /** @test */
    public function it_can_create_a_new_admin()
    {
        $this->be($this->createAdmin());

        $this->assertEquals(1, Admin::count());

        $response = $this->post(
            route('dashboard.admins.store'),
            [
                'name' => 'dummy admin',
                'email' => 'name@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'avatar' => $this->dummyBase64Image(),
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(2, Admin::count());
        $this->assertEquals(1, Admin::all()->last()->getMedia()->count());

        $this->assertDatabaseHas('users', [
            'name' => 'dummy admin',
            'email' => 'name@example.com',
            'type' => User::ADMIN_TYPE,
        ]);
    }

    /** @test */
    public function it_can_display_edit_admin_form()
    {
        $this->be($this->createAdmin());

        $admin = factory(Admin::class)->create();

        $response = $this->get(route('dashboard.admins.edit', $admin));

        $response->assertSuccessful();

        $response->assertViewIs('dashboard.admins.edit');
    }

    /** @test */
    public function it_can_update_a_spicific_admin()
    {
        $this->be($this->createAdmin());

        $this->assertEquals(1, Admin::count());

        $admin = factory(Admin::class)->create();

        $response = $this->put(
            route('dashboard.admins.update', $admin),
            [
                'name' => 'dummy admin',
                'email' => 'name@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'avatar' => $this->dummyBase64Image(),
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(2, Admin::count());
        $this->assertEquals(1, Admin::all()->last()->getMedia()->count());

        $this->assertDatabaseHas('users', [
            'name' => 'dummy admin',
            'email' => 'name@example.com',
            'type' => User::ADMIN_TYPE,
        ]);
    }

    /** @test */
    public function it_can_delete_a_spicific_admin()
    {
        $this->be($this->createAdmin());

        $admin = factory(Admin::class)->create();

        $response = $this->delete(route('dashboard.admins.destroy', $admin));

        $response->assertRedirect();

        $this->assertEquals(1, Admin::count());

        $this->assertDatabaseMissing('users', [
            'id' => $admin->id,
        ]);
    }

    public function test_validation()
    {
        $this->be($this->createAdmin());

        collect([
            [
                'url' => route('dashboard.admins.store'),
                'method' => 'POST',
            ],
        ])->each(function ($route) {
            $this->assertRequiredValidation('name', $route['url'], $route['method']);
            $this->assertMaxValidation('name', $route['url'], $route['method'], 255);
            $this->assertRequiredValidation('email', $route['url'], $route['method']);
        });
    }
}
