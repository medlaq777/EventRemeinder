<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'event_date', 'organizer_id'];

    public function recipients()
    {
        return $this->belongsToMany(Recipient::class)
            ->withPivot(['reminder_sent', 'reminder_sent_at']);
    }

    public function organizer()
    {
        return $this->belongsTo(Recipient::class, 'organizer_id');
    }
}
