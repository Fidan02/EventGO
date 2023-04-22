<?php

namespace App\Models;

use App\Models\City;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_name',
    ];


    public function cities(){
        return $this->hasMany(City::class);
    }
    public function events(){
        return $this->belongsTo(Event::class);
    }
}
