<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;

return function (Schedule $schedule) {
    $schedule->command('send:event-reminders')->everyMinute();
};