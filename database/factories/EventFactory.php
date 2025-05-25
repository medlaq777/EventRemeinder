<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'start_date' => $this->faker->dateTimeBetween('+1 days', '+2 years'),
            // Add other fields as needed
        ];
    }
}