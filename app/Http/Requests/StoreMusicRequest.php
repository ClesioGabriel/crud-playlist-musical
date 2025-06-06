<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMusicRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'artist_id' => 'required|exists:artists,id',
            'album_id' => 'nullable|exists:albums,id',
            'genre' => 'nullable|string|max:255',
            'file_path' => 'required|file|mimes:mp3,wav,ogg',
            'release_date' => 'nullable|date',
        ];
    }

}
