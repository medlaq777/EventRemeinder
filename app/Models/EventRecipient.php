<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class EventRecipient extends Pivot
{
    protected $casts = [
        'reminder_sent' => 'boolean',
        'reminder_sent_at' => 'datetime',
    ];

    // Optional: Add methods
    public function markAsSent()
    {
        $this->update([
            'reminder_sent' => true,
            'reminder_sent_at' => now(),
        ]);
    }
}