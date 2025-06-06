<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;
use App\Models\Artist;
use App\Models\Album;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';

    protected $fillable = [
        'title',
        'artist_id',
        'album_id',
        'genre',
        'file_path',
        'release_date',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];

    public function artist()
    {
        return $this->belongsTo(Artist::class);
    }
    
    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

}
