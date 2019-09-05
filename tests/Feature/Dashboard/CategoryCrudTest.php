<?php

namespace Tests\Feature\Dashboard;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Support\HasValidation;
use Tests\TestCase;

class CategoryCrudTest extends TestCase
{
    use RefreshDatabase, HasValidation;

    /** @test */
    public function it_can_see_category_link_in_sidebar()
    {
        $this->be($this->createAdmin());

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();

        $response->assertSee(e(trans('categories.plural')));
    }

    /** @test */
    public function it_can_list_categories()
    {
        $this->be($this->createAdmin());

        $category = factory(Category::class)->create();

        $response = $this->get(route('dashboard.categories.index'));

        $response->assertSuccessful();

        $response->assertSee(e($category->name));

        $response->assertViewIs('dashboard.categories.index');
    }

    /** @test */
    public function it_can_display_category_details()
    {
        $this->be($this->createAdmin());

        $category = factory(Category::class)->create();

        $response = $this->get(route('dashboard.categories.show', $category));

        $response->assertSuccessful();

        $response->assertSee(e($category->name));

        $response->assertViewIs('dashboard.categories.show');
    }

    /** @test */
    public function it_can_display_category_create_form()
    {
        $this->be($this->createAdmin());

        $response = $this->get(route('dashboard.categories.create'));

        $response->assertSuccessful();

        $response->assertViewIs('dashboard.categories.create');
    }

    /** @test */
    public function it_can_create_a_new_category()
    {
        $this->be($this->createAdmin());

        $this->assertEquals(0, Category::count());

        $response = $this->post(
            route('dashboard.categories.store'),
            ['name:en' => 'dummy category']
        );

        $response->assertRedirect();

        $this->assertEquals(1, Category::count());

        $this->assertDatabaseHas('category_translations', [
            'name'   => 'dummy category',
            'locale' => 'en',
        ]);
    }

    /** @test */
    public function it_can_display_category_edit_form()
    {
        $this->be($this->createAdmin());

        $category = factory(Category::class)->create();

        $response = $this->get(route('dashboard.categories.edit', $category));

        $response->assertSuccessful();

        $response->assertViewIs('dashboard.categories.edit');
    }

    /** @test */
    public function it_can_update_a_spicific_category()
    {
        $this->be($this->createAdmin());

        $this->assertEquals(0, Category::count());

        $category = factory(Category::class)->create();

        $response = $this->put(
            route('dashboard.categories.update', $category),
            ['name:en' => 'dummy category']
        );

        $response->assertRedirect();

        $this->assertEquals(1, Category::count());

        $this->assertDatabaseHas('category_translations', [
            'name'   => 'dummy category',
            'locale' => 'en',
        ]);
    }

    /** @test */
    public function it_can_delete_a_spicific_category()
    {
        $this->be($this->createAdmin());

        $category = factory(Category::class)->create();

        $response = $this->delete(route('dashboard.categories.destroy', $category));

        $response->assertRedirect();

        $this->assertEquals(0, Category::count());

        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }

    public function test_validation()
    {
        $this->be($this->createAdmin());

        $category = factory(Category::class)->create();

        collect([
            [
                'url'    => route('dashboard.categories.store'),
                'method' => 'POST',
            ],
            [
                'url'    => route('dashboard.categories.update', $category),
                'method' => 'PATCH',
            ],
        ])->each(function ($route) {
            // Validate name field
            $this->parseLocaledField('name', function ($field, $isDefault) use ($route) {
                if ($isDefault) { // required|max:255
                    $this->assertRequiredValidation($field, $route['url'], $route['method']);
                } else { // nullable|max:255
                    $this->assertNullableValidation($field, $route['url'], $route['method']);
                }
                $this->assertMaxValidation($field, $route['url'], $route['method'], 255);
            });
        });
    }
}
