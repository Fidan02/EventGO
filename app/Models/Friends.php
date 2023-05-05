<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Friends extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'user_id',
        'friend_id',
    ];

}
