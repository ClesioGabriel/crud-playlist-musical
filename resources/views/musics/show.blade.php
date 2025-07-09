@extends('admin.users.layouts.app')

@section('title', 'Detalhes da Música')

@section('content')
    <div class="py-6">
        <h2 class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Detalhes da Música: {{ $music->title }}
        </h2>
    </div>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-md mb-4"> 
        <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
            <li><strong>Título:</strong> {{ $music->title }}</li>
            <td><strong>Artista:</strong> {{ $music->artist->name ?? 'Artista não encontrado' }}</td>
            <li><strong>Álbum:</strong> <td>{{ $music->album->name ?? 'Álbum não encontrado' }}</td></li>
            <li><strong>Gênero:</strong> {{ $music->genre }}</li>
            <li><strong>Data de Lançamento:</strong> {{ \Carbon\Carbon::parse($music->release_date)->format('d/m/Y') }}</li>
        </ul>
    </div>

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
