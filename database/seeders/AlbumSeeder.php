<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Album;

class AlbumSeeder extends Seeder
{
    public function run(): void
    {
        Album::create([
            'image' => 'albums/uaFYLuRBRs6hV6m21QlG9ud33FSiXnMD2m2t3UwE.jpg',
            'name' => 'A Night at the Opera',
            'artist_id' => 1,
            'genre' => 'Rock',
        ]);

        Album::create([
            'image' => 'albums/umQuQc3kflDvwEwBTln4FSuTOdkDZHO6BoJ974d8.jpg',
            'name' => 'Abbey Road',
            'artist_id' => 2,
            'genre' => 'Rock',
        ]);

        Album::create([
            'image' => 'albums/0Z2ymsk24hehEJ6CPjBEt4QvBwlkj1FbRiaBa0NE.jpg',
            'name' => 'Embaixador Acústico',
            'artist_id' => 3,
            'genre' => 'Sertanejo',
        ]);

        Album::create([
            'image' => 'albums/CgQFcXF6pwbNAcxqYt1ZF0wcw47eBOkKVNUxVvwq.jpg',
            'name' => 'De Bar em Bar 7',
            'artist_id' => 4,
            'genre' => 'Brega',
        ]);
    }
}
