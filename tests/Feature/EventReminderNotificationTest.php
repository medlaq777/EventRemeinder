<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Recipient;
use App\Notifications\EventReminderNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EventReminderNotificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_notification_content()
    {
        $event = Event::factory()->create([
            'title' => 'Test Event',
            'start_date' => now()->addDays(15),
        ]);

        $notification = new EventReminderNotification($event);
        $mail = $notification->toMail($event->recipients()->first());

        $this->assertStringContainsString('Test Event is in 15 days!', $mail->subject);
        $this->assertStringContainsString('The event \'Test Event\' is happening', $mail->render());
    }
}