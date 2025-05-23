<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Event;
use App\Models\Recipient;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Event::factory(10)->create();
        Recipient::factory(10)->create();
        EventRecipient::factory(10)->create([
            'event_id' => Event::factory(),
            'recipient_id' => Recipient::factory(),
        ]);

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


    }
}
