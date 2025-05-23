<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    protected $fillable = ['name', 'email', 'active'];

    public function events()
    {
        return $this->belongsToMany(Event::class)
            ->withPivot(['reminder_sent', 'reminder_sent_at']);
    }
}
