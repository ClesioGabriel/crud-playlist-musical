<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Music;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        Music::create([
            'title' => 'Bohemian Rhapsody',
            'artist_id' => 1,
            'album_id' => 1,
            'genre' => 'rock',
        ]);

        Music::create([
            'title' => 'Come Together',
            'artist_id' => 2,
            'album_id' => 2,
            'genre' => 'rock',
        ]);
    }
}
