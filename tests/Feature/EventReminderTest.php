<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Recipient;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventReminderMail;
use Tests\TestCase;

class EventReminderTest extends TestCase
{
    public function test_reminders_are_sent()
    {
        Mail::fake();

        $event = Event::factory()->create([
            'event_date' => now()->addDays(15),
        ]);

        $recipient = Recipient::factory()->create(['active' => true]);
        $event->recipients()->attach($recipient);

        $this->artisan('reminders:send')
            ->assertExitCode(0);

        Mail::assertSent(EventReminderMail::class, function ($mail) use ($recipient) {
            return $mail->recipient->id === $recipient->id;
        });
    }
}