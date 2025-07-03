@extends('admin.users.layouts.app')

@section('title', 'Detalhes da Playlist')

@section('content')

    <div class="py-4"></div>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-md mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Detalhes da Playlist: {{ $playlist->name }}
            </h2>

            <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                <li><strong>Nome:</strong> {{ $playlist->name }}</li>
                @if (!empty($playlist->description))
                    <li><strong>Descrição:</strong> {{ $playlist->description }}</li>
                @endif
            </ul>
        </div>
    </div>

    <x-alert />

    <div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Músicas da Playlist:
            </h2>

            @if ($playlist->musics->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">Nenhuma música cadastrada.</p>
            @else
                <p class="text-gray-500 dark:text-gray-400 mb-4">
                    Total de músicas: {{ $playlist->musics->count() }}
                </p>

                <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                    @foreach ($playlist->musics as $music)
                        <li>
                            {{ $music->title }}
                            @if ($music->file_path)
                                — <a href="{{ route('musics.play', $music->id) }}" class="underline" target="_blank">Ouvir</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>

    <div class="flex items-center gap-4 mt-6">
        <a href="{{ route('playlists.index') }}">
            <x-primary-button>
                {{ __('Voltar') }}
            </x-primary-button>
        </a>

        @can('is-admin')
            <form action="{{ route('playlists.destroy', $playlist->id) }}" method="POST"
                onsubmit="return confirm('Tem certeza que deseja deletar?')">
                @csrf
                @method('delete')
                <x-danger-button type="submit">
                    {{ __('Deletar Playlist') }}
                </x-danger-button>
            </form>
        @endcan
    </div>

@endsection
