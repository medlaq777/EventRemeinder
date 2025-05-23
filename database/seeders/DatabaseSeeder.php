<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Recipient;
use App\Models\EventRecipient;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Event::factory(2)->create();
        Recipient::factory(2)->create();
        EventRecipient::factory(2)->create([
            'event_id' => Event::factory(),
            'recipient_id' => Recipient::factory(),
        ]);
    }
}
