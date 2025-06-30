@extends('admin.users.layouts.app')

@section('title', 'Detalhes da Música')

@section('content')
    <div class="py-6">
        <h2 class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Detalhes da Música {{ $music->name }}
        </h2>
    </div>
    <ul class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
        <li>Título: {{ $music->title }}</li>
        <td>Artista: {{ $music->artist->name ?? 'Artista não encontrado' }}</td>
        <li>Álbum: <td>{{ $music->album->name ?? 'Álbum não encontrado' }}</td></li>
        <li>Gênero: {{ $music->genre }}</li>
        <li>Data de Lançamento: {{ $music->release_date }}</li>
    </ul>
    <x-alert />

    <div class="flex items-center gap-4 mt-6">
        <a href="{{ route('musics.index') }}">
            <x-primary-button>
                {{ __('Voltar') }}
            </x-primary-button>
        </a>

        @can('is-admin')
            <form action="{{ route('musics.destroy', $music->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')">
                @csrf
                @method('delete')
                <x-danger-button type="submit">
                    {{ __('Deletar Música') }}
                </x-danger-button>
            </form>
        @endcan
    </div>
@endsection
