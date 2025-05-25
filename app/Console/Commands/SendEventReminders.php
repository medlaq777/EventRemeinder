<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Notifications\EventReminderNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;

class SendEventReminders extends Command
{
    protected $signature = 'send:event-reminders';
    protected $description = 'Send reminders for events starting in 15 days';

    public function handle()
    {
        $targetDate = Carbon::today()->addDays(15)->toDateString();

        $events = Event::whereDate('start_date', $targetDate)
            ->with('recipients')
            ->get();

        foreach ($events as $event) {
            foreach ($event->recipients as $recipient) {
                $recipient->notify(new EventReminderNotification($event));
            }
            $this->info("Sent reminders for event: {$event->title}");
        }

        $this->info('All reminders sent successfully!');
        return Command::SUCCESS;
    }
}