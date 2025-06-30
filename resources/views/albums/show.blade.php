@extends('admin.users.layouts.app')

@section('title', 'Detalhes do Álbum')

@section('content')

    <div class="py-4"</div>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-md mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Detalhes do Álbum: {{ $album->name }}
            </h2>

            <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                <li><strong>Título:</strong> {{ $album->name }}</li>
                <li><strong>Artista:</strong> {{ $album->artist->name ?? 'Artista não encontrado' }}</li>
                <li><strong>Gênero Musical:</strong> {{ $album->genre }}</li>
            </ul>
        </div>
    </div>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-md mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Músicas do Álbum:
            </h2>

            @if ($album->musics->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">Nenhuma música cadastrada.</p>
            @else
                <p class="text-gray-500 dark:text-gray-400 mb-4">
                    Total de músicas: {{ $album->musics->count() }}
                </p>

                <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                    @foreach ($album->musics as $music)
                        <li>
                            {{ $music->title }}
                            @if($music->file_path)
                                — <a href="{{ route('musics.play', $music->id) }}" class="underline" target="_blank">Ouvir</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>


    <x-alert />

    <div class="flex items-center gap-4 mt-6">
        <a href="{{ route('albums.index') }}">
            <x-primary-button>
                {{ __('Voltar') }}
            </x-primary-button>
        </a>

        @can('is-admin')
            <form action="{{ route('albums.destroy', $album->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')">
                @csrf
                @method('delete')
                <x-danger-button type="submit">
                    {{ __('Deletar Álbum') }}
                </x-danger-button>
            </form>
        @endcan
    </div>
@endsection
