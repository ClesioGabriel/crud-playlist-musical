<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use App\Models\Music;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        $musics = [
            [
                'title' => 'Bohemian Rhapsody',
                'artist_id' => 1,
                'album_id' => 1,
                'genre' => 'Rock',
                'filename' => '68668fa1eca04_queen_bohemian_rhapsody_mp3_50084.mp3',
                'release_date' => '1975-10-31',
            ],
            [
                'title' => 'Come Together',
                'artist_id' => 2,
                'album_id' => 2,
                'genre' => 'Rock',
                'filename' => '68668db4a1626_the_beatles_come_together_mp3_50211.mp3',
                'release_date' => '1969-10-06',
            ],
            [
                'title' => 'Frases Tão Doídas',
                'artist_id' => 3,
                'album_id' => 3,
                'genre' => 'Sertanejo',
                'filename' => '6866c479a3afd_gusttavo_lima_frases_tao_doidas_embaixador_acustico_in_greece_mp3_64214.mp3',
                'release_date' => '2024-11-25',
            ],
                        [
                'title' => '60 Segundos',
                'artist_id' => 3,
                'album_id' => 3,
                'genre' => 'Sertanejo',
                'filename' => '6866c48d51cf8_gusttavo_lima_60_segundos_embaixador_acustico_in_greece_mp3_64248.mp3',
                'release_date' => '2024-11-25',
            ],
            [
                'title' => 'Tocando em Frente',
                'artist_id' => 3,
                'album_id' => 3,
                'genre' => 'Sertanejo',
                'filename' => '6866c49d1264d_gusttavo_lima_tocando_em_frente_embaixador_acustico_in_greece_mp3_64293.mp3',
                'release_date' => '2024-11-25',
            ],
            [
                'title' => 'Voando Baixo',
                'artist_id' => 4,
                'album_id' => 4,
                'genre' => 'Brega',
                'filename' => '6866d55b4a7f0_voando_baixo_mp3_68594.mp3',
                'release_date' => '2025-03-12',
            ],
            [
                'title' => '5 da Manhã',
                'artist_id' => 4,
                'album_id' => 4,
                'genre' => 'Brega',
                'filename' => '6866d56ca7334_natanzinho_lima_5_da_manha_de_bar_em_bar_7_mp3_68646.mp3',
                'release_date' => '2025-03-12',
            ],

        ];

        foreach ($musics as $data) {
            $sourcePath = database_path('seeders/files/' . $data['filename']);
            $destinationPath = 'musics/' . $data['filename'];

            // Copia o arquivo para o storage, se ainda não existir
            if (file_exists($sourcePath)) {
                $stream = fopen($sourcePath, 'r');
                $copied = Storage::disk('public')->put($destinationPath, $stream);
                if (is_resource($stream)) {
                    fclose($stream);
                }

                // Cria a música no banco apenas se o arquivo foi copiado com sucesso
                if ($copied) {
                    Music::create([
                        'title' => $data['title'],
                        'artist_id' => $data['artist_id'],
                        'album_id' => $data['album_id'],
                        'genre' => $data['genre'],
                        'file_path' => $destinationPath,
                        'release_date' => $data['release_date'],
                    ]);
                }
            }
        }
    }
}
