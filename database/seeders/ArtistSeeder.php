<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artist;

class ArtistSeeder extends Seeder
{
    public function run(): void
    {
        $artists = [
            [
                'name' => 'Queen',
                'genre' => 'rock',
            ],
            [
                'name' => 'The Beatles',
                'genre' => 'rock',
            ],
        ];

        foreach ($artists as $artist) {
            Artist::create($artist);
        }
    }
}
