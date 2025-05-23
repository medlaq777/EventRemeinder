<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\Recipient;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class EventReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Event $event,
        public Recipient $recipient
    ) {}

    public function envelope()
    {
        return new Envelope(
            subject: "⏰ Reminder: {$this->event->name} in {$this->event->event_date->diffForHumans()}"
        );
    }

    public function content()
    {
        return new Content(
            markdown: 'emails.event-reminder',
            with: [
                'event' => $this->event,
                'recipient' => $this->recipient,
            ],
        );
    }
}