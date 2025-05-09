<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    protected $table = 'musics';

    protected $fillable = [
        'title',
        'artist',
        'album',
        'genre',
        'file_path',
        'release_date',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];

}
