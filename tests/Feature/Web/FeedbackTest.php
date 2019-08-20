<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use App\Models\Feedback;
use Tests\Support\HasValidation;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FeedbackTest extends TestCase
{
    use RefreshDatabase, HasValidation;

    /** @test */
    public function anyone_can_send_feedback_message()
    {
        $this->be($this->createAdmin());

        $this->assertEquals(0, Feedback::count());

        $response = $this->post(route('feedback'), [
                'name' => 'Ahmed Fathy',
                'email' => 'ahmed@example.com',
                'phone' => '123456789',
                'message' => 'dummy message',
            ]
        );

        $response->assertRedirect();

        $this->assertEquals(1, Feedback::count());

        $this->assertDatabaseHas('feedback', [
            'name' => 'Ahmed Fathy',
            'email' => 'ahmed@example.com',
            'phone' => '123456789',
            'message' => 'dummy message',
        ]);
    }

    public function test_validation()
    {
        $this->be($this->createAdmin());

        // Validate name field
        $this->assertRequiredValidation('name', route('feedback'), 'POST');
        $this->assertStringValidation('name', route('feedback'), 'POST');
        $this->assertMaxValidation('name', route('feedback'), 'POST', 255);

        // Validate email field
        $this->assertRequiredValidation('email', route('feedback'), 'POST');
        $this->assertEmailValidation('email', route('feedback'), 'POST');
        $this->assertMaxValidation('email', route('feedback'), 'POST', 255);

        // Validate phone field
        $this->assertNullableValidation('phone', route('feedback'), 'POST');
        $this->assertMaxValidation('phone', route('feedback'), 'POST', 255);

        // Validate message field
        $this->assertRequiredValidation('message', route('feedback'), 'POST');
        $this->assertStringValidation('message', route('feedback'), 'POST');
    }
}
