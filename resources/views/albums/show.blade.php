@extends('admin.users.layouts.app')

@section('title', 'Detalhes do Álbum')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Detalhes do Álbum: {{ $album->name }}
        </h2>
    </div>
    <ul class="max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
        <li>Nome: {{ $album->name }}</li>
        <li>Artista: {{ $album->artist }}</li>
        <li>Gênero Musical: {{ $album->genre }}</li>
    </ul>
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
