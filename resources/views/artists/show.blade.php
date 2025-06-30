@extends('admin.users.layouts.app')

@section('title', 'Detalhes do Artista')

@section('content')

    <div class="py-4"></div>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-md mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Detalhes do Artista: {{ $artist->name }}
            </h2>

            <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                <li><strong>Nome:</strong> {{ $artist->name }}</li>

                @if ($artist->albums->isNotEmpty())
                    <li>
                        <strong>Álbuns:</strong>
                        <ul class="list-disc list-inside ml-5">
                            @foreach ($artist->albums as $album)
                                <li>{{ $album->name }}</li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li><strong>Álbuns:</strong> Nenhum álbum associado</li>
                @endif

                <li><strong>Gênero Musical:</strong> {{ $artist->genre }}</li>
                <li><strong>Data de Nascimento:</strong> {{ $artist->birth_date }}</li>
            </ul>
        </div>
    </div>

    <div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Músicas do Artista:
            </h2>

            @if ($artist->musics->isEmpty())
                <p class="text-gray-500 dark:text-gray-400">Nenhuma música cadastrada.</p>
            @else
                <p class="text-gray-500 dark:text-gray-400 mb-4">
                    Total de músicas: {{ $artist->musics->count() }}
                </p>

                <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                    @foreach ($artist->musics as $music)
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
        <a href="{{ route('artists.index') }}">
            <x-primary-button>
                {{ __('Voltar') }}
            </x-primary-button>
        </a>

        @can('is-admin')
            <form action="{{ route('artists.destroy', $artist->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')">
                @csrf
                @method('delete')
                <x-danger-button type="submit">
                    {{ __('Deletar Artista') }}
                </x-danger-button>
            </form>
        @endcan
    </div>
@endsection
