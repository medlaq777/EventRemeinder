<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventReminderMail;

class SendEventReminders extends Command
{
    protected $signature = 'reminders:send {--days=15 : Days before event}';
    protected $description = 'Send reminders for upcoming events';

    public function handle()
    {
        $daysBefore = (int) $this->option('days');
        $targetDate = Carbon::now()->addDays($daysBefore)->toDateString();

        $events = Event::with(['recipients' => function ($query) {
            $query->where('active', true)
                ->wherePivot('reminder_sent', false);
        }])
            ->whereDate('event_date', $targetDate)
            ->get();

        $events->each(fn($event) => $this->processEvent($event));
    }

    protected function processEvent(Event $event)
    {
        $event->recipients->each(function ($recipient) use ($event) {
            try {
                Mail::to($recipient->email)
                    ->queue(new EventReminderMail($event, $recipient));

                $event->recipients()->updateExistingPivot($recipient->id, [
                    'reminder_sent' => true,
                    'reminder_sent_at' => now(),
                ]);

                $this->info("✅ Sent to: {$recipient->email}");
            } catch (\Exception $e) {
                Log::error("Failed to send to {$recipient->email}", [
                    'error' => $e->getMessage(),
                ]);
                $this->error("❌ Failed: {$recipient->email}");
            }
        });
    }
}
