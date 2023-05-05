<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Likes;
use App\Models\Comment;
use App\Models\Gallery;
use App\Models\Message;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function events(){
        return $this->hasMany(Event::class);
    }
    public function galleries(){
        return $this->hasMany(Gallery::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function savedEvents(){
        return $this->belongsToMany(Event::class, 'saved_events');
    }
    public function likes(){
        return $this->hasMany(Likes::class);
    }
    public function attendingEvents(){
        return $this->belongsToMany(Event::class, 'attendings');
    }
    public function friends(){
        return $this->belongsToMany(User::class, 'friends', 'user_id','friend_id')
                                    ->wherePivot('status', 'accepted');
    }
    public function friendRequests(){
        return $this->belongsToMany(User::class, 'friends', 'user_id','friend_id')
        ->wherePivot('status', 'pending');
    }
    public function messages(){
        return $this->belongsToMany(Message::class, 'messages');
    }
}
