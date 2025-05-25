<?php

namespace Database\Factories;

use App\Models\Recipient;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipientFactory extends Factory
{
    protected $model = Recipient::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => "medlaq547@gmail.com",
            // Add other fields as needed
        ];
    }
}