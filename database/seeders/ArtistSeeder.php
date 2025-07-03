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
                'image' => 'artists/sTe7wJwR8UrfOoIlFH6pG0VOVpcgh3WxmGqvzxnK.jpg',
                'name' => 'Queen',
                'genre' => 'Rock',
                'birth_date' => '01-06-1970',
            ],
            [
                'image' => 'artists/NEca9XkWaJZe3S5Nc90gMMXPS0fhAaVHQZcjlbKo.jpg',
                'name' => 'The Beatles',
                'genre' => 'Rock',
                'birth_date' => '25-06-1960',
            ],
            [
                'image' => 'artists/b7hDoQxbi8ZQMQknRfueOOxL0gJDtfhSFkHrIPk4.jpg',
                'name' => 'Gusttavo Lima',
                'genre' => 'Sertanejo',
                'birth_date' => '03-09-1989',
            ],
            [
                'image' => 'artists/atHYrLjrWQxaV1i1HUffwNG9fZyOh4T9YfpMwXsc.jpg',
                'name' => 'Natanzinho Lima',
                'genre' => 'Brega',
                'birth_date' => '15-08-1995',
            ]
        ];

        foreach ($artists as $artist) {
            Artist::create($artist);
        }
    }
}
