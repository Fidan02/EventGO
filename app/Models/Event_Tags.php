<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event_Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'tag_id',
    ];
}
