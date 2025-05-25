<?php

namespace App\Notifications;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventReminderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(public Event $event) {}

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Reminder: {$this->event->title} is in 15 days!")
            ->line("The event '{$this->event->title}' is happening on {$this->event->start_date->format('F j, Y')}.")
            ->action('View Event', url('/events/' . $this->event->id))
            ->line('Thank you for using our service!');
    }
}