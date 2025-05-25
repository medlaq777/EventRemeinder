<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipient extends Model
{
    use Notifiable, HasFactory;

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}