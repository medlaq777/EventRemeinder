<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use App\Models\Recipient;

class EventRecipientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_id' => Event::factory(),
            'recipient_id' => Recipient::factory(),
            'reminder_sent' => false,
            'reminder_sent_at' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
