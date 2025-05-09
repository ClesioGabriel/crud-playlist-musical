<x-alert />

<form method="POST" action="{{ isset($music) ? route('musics.update', $music->id) : route('musics.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($music))
        @method('PUT')
    @endif

    <div class="mb-4">
        <input type="text" name="title" placeholder="Título" value="{{ $music->title ?? old('title') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <input type="text" name="artist" placeholder="Artista" value="{{ $music->artist ?? old('artist') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <input type="text" name="album" placeholder="Álbum" value="{{ $music->album ?? old('album') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <select name="genre"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled {{ old('genre', $music->genre ?? '') == '' ? 'selected' : '' }}>Selecione o Gênero Musical</option>
            @foreach(['rock' => 'Rock', 'pop' => 'Pop', 'hiphop' => 'Hip-Hop', 'classical' => 'Classical', 'electronic' => 'Electronic', 'reggae' => 'Reggae', 'other' => 'Other'] as $value => $label)
                <option value="{{ $value }}" {{ old('genre', $music->genre ?? '') == $value ? 'selected' : '' }}>{{ $label }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <input type="file" name="file_path"
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
</form>
