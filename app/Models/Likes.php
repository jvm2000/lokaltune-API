<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Likes extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'date_liked',
        'user_uuid',
        'song_uuid',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_uuid');
    }

    public function songs()
    {
        return $this->belongsToMany(Songs::class, 'song_uuid');
    }
}
