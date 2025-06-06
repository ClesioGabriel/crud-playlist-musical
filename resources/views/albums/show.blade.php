@extends('admin.users.layouts.app')

@section('title', 'Detalhes do Álbum')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Detalhes do Álbum: {{ $album->name }}
        </h2>
    </div>
    <ul class="max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
        <li>Título: {{ $album->name }}</li>
        <li>Artista: {{ $album->artist->name ?? 'Artista não encontrado' }}</li>
        <li>Gênero Musical: {{ $album->genre }}</li>
    </ul>

    <div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
        Músicas do Álbum:
    </h2>
    </div>

    @if ($album->musics->isEmpty())
        <p class="max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">Nenhuma música cadastrada.</p>
    @else
        <ul class="max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
            @foreach ($album->musics as $music)
                <li>
                    {{ $music->title }} 
                    @if($music->file_path)
                        — <a href="{{ asset('storage/' . $music->file_path) }}" class="max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6 underline" target="_blank">Ouvir</a>
                    @endif
                </li>
            @endforeach
        </ul>
    @endif

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
