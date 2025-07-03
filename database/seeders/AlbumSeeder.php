<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        Album::create([
            'name' => 'A Night at the Opera',
            'artist_id' => 1,
            'genre' => 'Rock',
        ]);

        Album::create([
            'name' => 'Abbey Road',
            'artist_id' => 2,
            'genre' => 'Rock',
        ]);
    }
}
