<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'user_id',
    ];


    public function musics()
    {
        return $this->belongsToMany(Music::class, 'music_playlist', 'playlist_id', 'music_id');
    }

}
