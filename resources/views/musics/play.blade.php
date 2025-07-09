@extends('admin.users.layouts.app')

@section('title', 'Reprodução da Música')

@section('content')

<div class="py-4"></div>

<div class="py-8"></div>

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Reproduzindo:</h2>

    <div class="mb-4">
        <p class="text-lg font-medium text-gray-800 dark:text-gray-200">Título: {{ $music->title }}</p>
        <p class="text-sm text-gray-600 dark:text-gray-400">Artista: {{ $music->artist->name ?? '-' }}</p>
        <p class="text-sm text-gray-600 dark:text-gray-400">Álbum: {{ $music->album->name ?? '-' }}</p>
        <p class="text-sm text-gray-600 dark:text-gray-400">Gênero: {{ $music->genre }}</p>
    </div>

    <audio controls class="w-full">
        <source src="{{ asset('storage/' . $music->file_path) }}" type="audio/mpeg">
        Seu navegador não suporta o elemento de áudio.
    </audio>

    <div class="mt-6 flex justify-between items-center">
        


    <div>
        @if(in_array($music->id, $likedMusicIds))
            <!-- Botão de Descurtir -->
            <form action="{{ route('musics.unlike', $music->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <x-primary-button class="text-red-500" type="submit">Descurtir</x-primary-button>
            </form>
        @else
            <!-- Botão de Curtir -->
            <form action="{{ route('musics.like', $music->id) }}" method="POST">
                @csrf
                <x-primary-button class="text-blue-500" type="submit">Curtir</x-primary-button>
            </form>
        @endif
    </div>


        
        <a href="{{ route('musics.index') }}">
            <x-primary-button>
                {{ __('Voltar') }}
            </x-primary-button>
        </a>    

    </div>
</div>
@endsection
