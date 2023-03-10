<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'event',
        'venue',
        'event_date',
        'event_time',
        'event_end_date',
        'event_end_time',
        'guest',
        'event_status'
      ];
}
