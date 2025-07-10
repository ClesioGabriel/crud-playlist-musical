<x-alert />

<div>
    @csrf

    {{-- Nome da playlist --}}
    <div class="mb-4">
        <input
            type="text"
            name="name"
            placeholder="Nome da Playlist"
            value="{{ old('name', $playlist->name ?? '') }}"
            required
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
    </div>

    {{-- Imagem --}}
    <div class="mb-4">
        <input
            type="file"
            name="image"
            id="image"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >

        {{-- Mostrar imagem atual (somente na edição) --}}
        @if(isset($playlist) && $playlist->image)
            <div class="mt-2">
                <p class="text-sm text-gray-600 dark:text-gray-400">Imagem atual:</p>
                <img
                    src="{{ asset('storage/' . $playlist->image) }}"
                    alt="Imagem da Playlist"
                    class="w-32 h-32 object-cover mt-1 rounded"
                >
            </div>
        @endif
    </div>

    {{-- Descrição --}}
    <div class="mb-4">
        <input
            type="text"
            name="description"
            placeholder="Descrição"
            value="{{ old('description', $playlist->description ?? '') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        >
    </div>

    <div class="mb-4">
    <label class="mb-4 block text-gray-700 dark:text-gray-300">
        Selecione as Músicas
    </label>

    <div class="mb-4">
        <input
            type="text"
            id="music-search"
            placeholder="Buscar músicas ou artistas..."
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-white text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            onkeyup="filterMusics()"
        >
    </div>

    <div id="musics-list" class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-4" style="display: none;">
        @foreach ($musics as $music)
            <label class="flex items-center gap-4 p-4 rounded-lg border border-gray-300 bg-white dark:bg-gray-800 mb-4 music-item"
                data-title="{{ strtolower($music->title) }}"
                data-artist="{{ strtolower($music->artist->name ?? '') }}">
                <input
                    type="checkbox"
                    name="music_id[]"
                    value="{{ $music->id }}"
                    @if((isset($playlist) && $playlist->musics->contains($music)) || (is_array(old('music_id')) && in_array($music->id, old('music_id'))))
                        checked
                    @endif
                    class="text-blue-600 bg-white border-gray-300 rounded focus:ring-blue-500"
                >
                <span class="text-gray-900 dark:text-white">
                    {{ $music->title }}
                    @if(isset($music->artist))
                        <span class="text-xs text-gray-500 dark:text-gray-400">({{ $music->artist->name }})</span>
                    @endif
                </span>
            </label>
        @endforeach
    </div>

    <script>
        function filterMusics() {
            const search = document.getElementById('music-search').value.toLowerCase();
            const musicsList = document.getElementById('musics-list');
            const items = musicsList.querySelectorAll('.music-item');
            let anyVisible = false;

            items.forEach(item => {
                const title = item.getAttribute('data-title');
                const artist = item.getAttribute('data-artist');
                const match = (title && title.includes(search)) || (artist && artist.includes(search));
                item.style.display = (match && search.length > 0) ? '' : 'none';
                if (match && search.length > 0) anyVisible = true;
            });

            musicsList.style.display = search.length > 0 && anyVisible ? '' : 'none';
        }
    </script>
</div>


    {{-- Botões --}}
    <div class="flex items-center gap-4 mt-6">
        <a href="{{ route('playlists.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
            {{ __('Voltar') }}
        </a>

        <x-primary-button>
            <i class="fa-solid fa-plus me-2"></i> {{ __('Enviar') }}
        </x-primary-button>
    </div>
</div>
