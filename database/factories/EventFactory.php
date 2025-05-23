<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recipient;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'event_date' => $this->faker->dateTimeBetween('now', '+30 days'),
            'organizer_id' => Recipient::factory(), // Add this line
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
