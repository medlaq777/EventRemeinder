<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventRecipient extends Pivot
{
    use SoftDeletes, HasFactory;

    public $timestamps = false;

    protected $casts = [
        'reminder_sent' => 'boolean',
        'reminder_sent_at' => 'datetime',
    ];

    public function markAsSent()
    {
        $this->update([
            'reminder_sent' => true,
            'reminder_sent_at' => now(),
        ]);
    }
}
