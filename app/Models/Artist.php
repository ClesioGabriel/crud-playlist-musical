<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'album_id',
        'genre',
        'birth_date',
    ]; 
    protected $casts = [
        'birth_date' => 'date',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

}
