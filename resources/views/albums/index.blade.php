@extends('admin.users.layouts.app')

@section('title', 'Listagem dos Álbuns')

@section('content')
    <div class="py-6 mb-2">
        <a href="{{ route('albums.create') }}">
            <x-primary-button>
                <i class="fa-solid fa-plus m-1"></i> Cadastrar Novo Álbum
            </x-primary-button>
        </a>
    </div>

    <x-alert />

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">Título</th>
                    <th scope="col" class="px-6 py-4">Artista</th>
                    <th scope="col" class="px-6 py-4">Gênero</th>
                    <th scope="col" class="px-6 py-4">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($albums as $album)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                        <td class="px-6 py-4">{{ $album->name }}</td>
                        <td>{{ $album->artist->name ?? 'Artista não encontrado' }}</td>
                        <td class="px-6 py-4">{{ $album->genre }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('albums.edit', $album->id) }}" class="text-blue-600 hover:underline">Editar</a>
                            <a href="{{ route('albums.show', $album->id) }}" class="text-blue-600 hover:underline">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Nenhum álbum no banco.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{ $albums->links() }}
    </div>
@endsection