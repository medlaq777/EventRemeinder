<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;
    protected $casts = [
        'start_date' => 'date',
    ];

    public function recipients(): BelongsToMany
    {
        return $this->belongsToMany(Recipient::class);
    }
}