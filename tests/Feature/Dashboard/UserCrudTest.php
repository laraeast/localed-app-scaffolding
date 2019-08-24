<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;
use App\Models\User;
use Tests\Support\HasValidation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserCrudTest extends TestCase
{
    use RefreshDatabase, HasValidation;

    /** @test */
    public function it_can_see_user_link_in_sidebar()
    {
        $this->be($this->createAdmin());

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();

        $response->assertSee(e(trans('users.plural')));
    }

    /** @test */
    public function it_can_list_users()
    {
        $this->be($this->createAdmin());

        $user = factory(User::class)->create();

        $response = $this->get(route('dashboard.users.index'));

        $response->assertSuccessful();

        $response->assertSee(e($user->name));

        $response->assertViewIs('dashboard.users.index');
    }

    /** @test */
    public function it_can_display_user_details()
    {
        $this->be($this->createAdmin());

        $user = factory(User::class)->create();

        $response = $this->get(route('dashboard.users.show', $user));

        $response->assertSuccessful();

        $response->assertSee(e($user->name));

        $response->assertViewIs('dashboard.users.show');
    }

    /** @test */
    public function it_can_display_user_create_form()
    {
        $this->be($this->createAdmin());

        $response = $this->get(route('dashboard.users.create'));

        $response->assertSuccessful();

        $response->assertViewIs('dashboard.users.create');
    }

    /** @test */
    public function it_can_create_a_new_user()
    {
        $this->be($this->createAdmin());

        $this->assertEquals(1, User::count());

        $response = $this->post(
            route('dashboard.users.store'),
            [
                'name' => 'dummy user',
                'email' => 'name@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'avatar' => $this->dummyBase64Image(),
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(2, User::count());
        $this->assertEquals(1, User::all()->last()->getMedia()->count());

        $this->assertDatabaseHas('users', [
            'name' => 'dummy user',
            'email' => 'name@example.com',
            'type' => User::USER_TYPE,
        ]);
    }

    /** @test */
    public function it_can_display_user_edit_form()
    {
        $this->be($this->createAdmin());

        $user = factory(User::class)->create();

        $response = $this->get(route('dashboard.users.edit', $user));

        $response->assertSuccessful();

        $response->assertSee(e($user->name));

        $response->assertViewIs('dashboard.users.edit');
    }

    /** @test */
    public function it_can_update_a_spicific_user()
    {
        $this->be($this->createAdmin());

        $this->assertEquals(1, User::count());

        $user = factory(User::class)->create();

        $response = $this->put(
            route('dashboard.users.update', $user),
            [
                'name' => 'dummy user',
                'email' => 'name@example.com',
                'password' => 'password',
                'password_confirmation' => 'password',
                'avatar' => $this->dummyBase64Image(),
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(2, User::count());
        $this->assertEquals(1, User::all()->last()->getMedia()->count());

        $this->assertDatabaseHas('users', [
            'name' => 'dummy user',
            'email' => 'name@example.com',
            'type' => User::USER_TYPE,
        ]);
    }

    /** @test */
    public function it_can_delete_a_spicific_user()
    {
        $this->be($this->createAdmin());

        $user = factory(User::class)->create();

        $response = $this->delete(route('dashboard.users.destroy', $user));

        $response->assertRedirect();

        $this->assertEquals(1, User::count());

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    public function test_validation()
    {
        $this->be($this->createAdmin());


        collect([
            [
                'url' => route('dashboard.users.store'),
                'method' => 'POST',
            ],
        ])->each(function ($route) {
            $this->assertRequiredValidation('name', $route['url'], $route['method']);
            $this->assertMaxValidation('name', $route['url'], $route['method'], 255);
            $this->assertRequiredValidation('email', $route['url'], $route['method']);
        });
    }
}
