<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'artist_id',
        'genre',
    ];

    public function artist(){   
        return $this->belongsTo(Artist::class);
    }

    public function musics()
    {
        return $this->hasMany(Music::class);
    }

}
