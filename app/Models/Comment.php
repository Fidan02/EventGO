<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }
    public function events(){
        return $this->belongsTo(Event::class);
    }
}
