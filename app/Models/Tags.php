<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name'
    ];

    public function events(){
        return $this->belongsToMany(Event::class, 'event__tags');
    }
}
