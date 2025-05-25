<?php

namespace Tests\Unit\Commands;

use App\Models\Event;
use App\Models\Recipient;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class SendEventRemindersTest extends TestCase
{
    use RefreshDatabase;

    public function test_sends_reminder_for_events_in_15_days()
    {
        Notification::fake();

        $event = Event::factory()->create([
            'start_date' => now()->addDays(15),
        ]);

        $recipient = Recipient::factory()->create();
        $event->recipients()->attach($recipient);

        $this->artisan('send:event-reminders')
            ->expectsOutput("Sent reminders for event: {$event->title}")
            ->expectsOutput('All reminders sent successfully!')
            ->assertExitCode(0);

        Notification::assertSentTo(
            [$recipient],
            \App\Notifications\EventReminderNotification::class
        );
    }

    public function test_does_not_send_for_non_15_day_events()
    {
        Notification::fake();

        Event::factory()->create([
            'start_date' => now()->addDays(14),
        ]);

        $this->artisan('send:event-reminders')
            ->expectsOutput('All reminders sent successfully!')
            ->assertExitCode(0);

        Notification::assertNothingSent();
    }
}