<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Recipient extends Model
{
    use Notifiable;

    public function events(): BelongsToMany
    {
        return $this->belongsToMany(Event::class);
    }
}