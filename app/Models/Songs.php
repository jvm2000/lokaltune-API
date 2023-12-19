<?php

namespace App\Models;

use App\Models\Comments;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Songs extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'duration',
        'genre',
        'lyrics',
        'image',
        'file_mp3',
        'artist_uuid',
    ];

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_uuid');
    }

    public function likes()
    {
        return $this->hasMany(Likes::class);
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
