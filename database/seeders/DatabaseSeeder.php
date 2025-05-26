<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Recipient;
use App\Models\User;
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);


        $event15 = Event::create([
            'title' => 'Test Event',
            'start_date' => now()->addDays(15),

        ]);
        $event10 = Event::create([
            'title' => 'Test Event',
            'start_date' => now()->addDays(10),

        ]);
        $event3 = Event::create([
            'title' => 'Test Event',
            'start_date' => now()->addDays(3),

        ]);
        $event1 = Event::create([
            'title' => 'Test Event',
            'start_date' => now()->addDays(1),

        ]);

        $recipient = Recipient::factory()->create([
            'name' => 'Test Recipient',
            'email' => 'ajouamymiloud@gmail.com',
        ]);

        $event15->recipients()->attach($recipient->id);
        $event10->recipients()->attach($recipient->id);
        $event3->recipients()->attach($recipient->id);
        $event1->recipients()->attach($recipient->id);
    }
}
