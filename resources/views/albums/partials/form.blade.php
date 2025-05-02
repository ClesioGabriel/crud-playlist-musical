<x-alert />

<div class="">
    @csrf()
    <div class="mb-4">
        <input type="text" name="name" placeholder="Nome" value="{{ $album->name ?? old('name') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <input type="text" name="artist" placeholder="Artista" value="{{ $album->artist ?? old('artist') }}"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

    <div class="mb-4">
        <select name="genre"
            class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" disabled selected>Selecione o Gênero Musical</option>
            <option value="rock" {{ (old('genre') == 'rock' || ($artist->genre ?? '') == 'rock') ? 'selected' : '' }}>Rock</option>
            <option value="pop" {{ (old('genre') == 'pop' || ($artist->genre ?? '') == 'pop') ? 'selected' : '' }}>Pop</option>
            <option value="hiphop" {{ (old('genre') == 'hiphop' || ($artist->genre ?? '') == 'hiphop') ? 'selected' : '' }}>Hip-Hop</option>
            <option value="classical" {{ (old('genre') == 'classical' || ($artist->genre ?? '') == 'classical') ? 'selected' : '' }}>Classical</option>
            <option value="electronic" {{ (old('genre') == 'electronic' || ($artist->genre ?? '') == 'electronic') ? 'selected' : '' }}>Electronic</option>
            <option value="reggae" {{ (old('genre') == 'reggae' || ($artist->genre ?? '') == 'reggae') ? 'selected' : '' }}>Reggae</option>
            <option value="sertanejo" {{ (old('genre') == 'sertanejo' || ($artist->genre ?? '') == 'sertanejo') ? 'selected' : '' }}>Sertanejo</option>
            <option value="funk" {{ (old('genre') == 'funk' || ($artist->genre ?? '') == 'funk') ? 'selected' : '' }}>Funk</option>
            <option value="trap" {{ (old('genre') == 'trap' || ($artist->genre ?? '') == 'trap') ? 'selected' : '' }}>Trap</option>
            <option value="other" {{ (old('genre') == 'other' || ($artist->genre ?? '') == 'other') ? 'selected' : '' }}>Other</option>
        </select>
    </div>

    <div class="flex items-center gap-4 mt-6">
    <a href="{{ route('albums.index') }}"
       class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        {{ __('Voltar') }}
    </a>

    <x-primary-button>
        <i class="fa-solid fa-plus me-2"></i> Enviar
    </x-primary-button>
</div>

</div>