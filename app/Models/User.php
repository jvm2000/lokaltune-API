<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Likes;
use App\Models\Artist;
use App\Models\Comments;
use App\Models\Notifications;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'name',
        'birth_date',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getAgeAttribute()
    {
        return $this->birth_date?->diffInYears(now());
    }

    public function artist()
    {
        return $this->hasOne(Artist::class);
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }
}
