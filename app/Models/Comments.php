<?php

namespace App\Models;

use App\Models\User;
use App\Models\Songs;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comments extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'comment_text',
        'date_posted',
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
