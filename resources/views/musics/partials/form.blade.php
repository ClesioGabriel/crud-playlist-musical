<x-alert />

<div class="mb-4">
    <input type="text" name="title" placeholder="Título" value="{{ $music->title ?? old('title') }}"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>

<div class="mb-4">
    <select name="artist_id"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Selecione um artista</option>
        @foreach($artists as $artist)
            <option value="{{ $artist->id }}"
                {{ (isset($music) && $music->artist_id == $artist->id) || old('artist_id') == $artist->id ? 'selected' : '' }}>
                {{ $artist->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <select name="album_id"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="">Selecione um álbum</option>
        @foreach($albums as $album)
            <option value="{{ $album->id }}"
                {{ old('album_id') == $album->id || (isset($music) && $music->album_id == $album->id) ? 'selected' : '' }}>
                {{ $album->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <select name="genre"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        <option value="" disabled {{ old('genre') ? '' : 'selected' }}>Selecione o Gênero Musical</option>
        @php
            $genres = ['rock', 'pop', 'hiphop', 'classical', 'electronic', 'reggae', 'sertanejo', 'funk', 'trap', 'brega', 'other'];
        @endphp
        @foreach($genres as $genre)
            <option value="{{ $genre }}" {{ old('genre') == $genre || ($music->genre ?? '') == $genre ? 'selected' : '' }}>
                {{ ucfirst($genre) }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-4">
    <input type="file" name="file_path" accept="audio/*"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>

<div class="mb-4">
    <input type="date" name="release_date" placeholder="Data de Lançamento" value="{{ $music->release_date ?? old('release_date') }}"
        class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
</div>

<div class="flex items-center gap-4 mt-6">
    <a href="{{ route('musics.index') }}"
        class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        {{ __('Voltar') }}
    </a>

    <x-primary-button>
        <i class="fa-solid fa-plus me-2"></i> Enviar
    </x-primary-button>
</div>
