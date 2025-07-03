@extends('admin.users.layouts.app')

@section('title', 'Listagem das Playlists')


@section('content')
    <div class="py-6 mb-2">

    <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Playlists</h1>

        <a href="{{ route('playlists.create') }}">
        <x-primary-button>
        <i class="fa-solid fa-plus m-1"></i>Cadastrar Nova Playlist
        </x-primary-button>
        </a>


    </div>

    <x-alert />

    <div class="flex flex-wrap gap-6">
        @forelse ($playlists as $playlist)
            <div class="w-[18%] bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4 flex flex-col items-center">
                <a href="{{ route('playlists.show', $playlist->id) }}" class="block w-full">
                    <div class="w-[200px] h-[200px] flex items-center justify-center rounded-lg overflow-hidden mb-4 border border-gray-200 dark:border-gray-700 transition-transform transition duration-200 hover:scale-105 hover:shadow-lg">
                        @if($playlist->image)
                            <img src="{{ $playlist->image && file_exists(public_path('storage/' . $playlist->image)) ? asset('storage/' . $playlist->image) : asset('images/default-playlist.png') }}" alt="{{ $playlist->name }}"
                                class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 dark:bg-gray-700 text-gray-400">
                                <img src="{{ asset('storage/playlists/F1MrRPbBrDljPcTsajAXgan1VLXn5DSbfjpwjaF4.png') }}">
                            </div>
                        @endif
                    </div>
                </a>
                <div class="text-center w-full">
                    <div class="font-semibold text-lg text-gray-800 dark:text-gray-100 truncate" title="{{ $playlist->name }}">{{ $playlist->name }}</div>

                    <div class="flex justify-center space-x-3 text-xs">
                        <a href="{{ route('playlists.edit', $playlist->id) }}" class="text-gray-600 hover:underline">Editar</a>
                    </div>

                </div>
            </div>
        @empty
            <div class="w-full text-center py-8 text-gray-500 dark:text-gray-400">
                Nenhuma playlist no banco.
            </div>
        @endforelse
    </div>

    <div class="py-4 flex justify-center">
        {{ $playlists->links() }}
    </div>

@endsection