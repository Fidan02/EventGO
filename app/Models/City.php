<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_name',
        'country_id'
    ];


    public function countries(){
        return $this->belongsTo(Country::class);
    }
    public function events(){
        return $this->hasMany(Event::class);
    }
}
