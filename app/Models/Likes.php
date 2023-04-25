<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Likes extends Model
{
    use HasFactory;

    protected $fillable = [
        'like',
        'user_id',
        'event_id',
    ];

    public function events(){
        return $this->belongsTo(Event::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }

}
