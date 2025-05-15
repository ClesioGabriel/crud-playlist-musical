@extends('admin.users.layouts.app')

@section('title', 'Listagem das Playlists')


@section('content')
    <div class="py-6 mb-2">

        <a href="{{ route('playlists.create') }}">
        <x-primary-button>
        <i class="fa-solid fa-plus m-1"></i>Cadastrar Nova Playlist
        </x-primary-button>
        </a>


    </div>

    <x-alert />

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">Título</th>
                    <th scope="col" class="px-6 py-4">Descrição</th>
                    <th scope="col" class="px-6 py-4">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($playlists as $playlist)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $playlist->name }}</td>
                        <td class="px-6 py-4">{{ $playlist->description }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('playlists.edit', $playlist->id) }}">Editar</a>
                            <a href="{{ route('playlists.show', $playlist->id) }}">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Nenhuma playlist no banco</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{ $playlists->links() }}
    </div>
@endsection