<?php

namespace Tests\Feature\Dashboard;

use App\Models\Feedback;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_see_feedback_link_in_sidebar()
    {
        $this->be($this->createAdmin());

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();

        $response->assertSee(e(trans('feedback.plural')));
    }

    /** @test */
    public function it_can_list_feedback()
    {
        $this->be($this->createAdmin());

        $feedback = factory(Feedback::class)->create();

        $response = $this->get(route('dashboard.feedback.index'));

        $response->assertSuccessful();

        $response->assertSee(e($feedback->name));

        $response->assertViewIs('dashboard.feedback.index');
    }

    /** @test */
    public function it_can_display_feedback_details()
    {
        $this->be($this->createAdmin());

        $feedback = factory(Feedback::class)->create();

        $this->assertFalse($feedback->isReaded());

        $response = $this->get(route('dashboard.feedback.show', $feedback));

        $response->assertSuccessful();

        $this->assertTrue($feedback->refresh()->isReaded());

        $response->assertSee(e($feedback->name));

        $response->assertViewIs('dashboard.feedback.show');
    }

    /** @test */
    public function it_can_delete_a_spicific_feedback()
    {
        $this->be($this->createAdmin());

        $feedback = factory(Feedback::class)->create();

        $response = $this->delete(route('dashboard.feedback.destroy', $feedback));

        $response->assertRedirect();

        $this->assertEquals(0, Feedback::count());

        $this->assertDatabaseMissing('feedback', [
            'id' => $feedback->id,
        ]);
    }
}
