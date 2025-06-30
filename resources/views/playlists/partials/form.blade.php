<x-alert />

<div class="">
    @csrf()
    <div class="mb-4">
        <input type="text" name="name" placeholder="Nome" value="{{ $playlist->name ?? old('name') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>
    
    <div class="mb-4">
        <input type="file" name="image" placeholder="Imagem da Playlist"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <input type="text" name="description" placeholder="Descrição" value="{{ $playlist->description ?? old('description') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <label class="block mb-2 text-sm font-medium text-gray-900">
            Selecione uma ou mais músicas
        </label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
            @foreach ($musics as $music)
                <label class="flex items-center space-x-2 p-4 rounded-lg border border-gray-300 bg-white">
                    <input type="checkbox" name="music_id[]"
                        value="{{ $music->id }}"
                        @if ( (isset($playlist) && $playlist->musics->contains($music)) || (is_array(old('music_id')) && in_array($music->id, old('music_id'))) )
                            checked
                        @endif
                        class="text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500">
                    <span class="text-gray-900">{{ $music->title }}</span>
                </label>
            @endforeach
        </div>
    </div>  

    <div class="flex items-center gap-4 mt-6">
        <a href="{{ route('playlists.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            {{ __('Voltar') }}
        </a>

        <x-primary-button>
            <i class="fa-solid fa-plus me-2"></i> Enviar
        </x-primary-button>
    </div>
</div>

</div>