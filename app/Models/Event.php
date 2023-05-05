<?php

namespace App\Models;

use App\Models\City;
use App\Models\Tags;
use App\Models\User;
use App\Models\Likes;
use App\Models\Comment;
use App\Models\Country;
use App\Models\Attending;
use App\Models\SavedEvents;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'time',
        'start_date',
        'end_date',
        'image',
        'address',
        'country_id',
        'city_id',
        'user_id',
    ];
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function savedEvents(){
        return $this->belongsToMany(User::class, 'saved_events');
    }
    public function likes(){
        return $this->hasMany(Likes::class);
    }
    public function attending(){
        return $this->belongsToMany(User::class, 'attendings');
    }
    public function tags(){
        return $this->belongsToMany(Tags::class, 'event__tags', 'event_id', 'tag_id');
    }
}
