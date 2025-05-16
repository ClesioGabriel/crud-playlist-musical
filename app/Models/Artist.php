<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'genre',
        'birth_date',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    // Um artista pode ter vários álbuns
    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
