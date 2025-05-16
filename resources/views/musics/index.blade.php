@extends('admin.users.layouts.app')

@section('title', 'Listagem das Músicas')


@section('content')
    <div class="py-6 mb-2">

        <a href="{{ route('musics.create') }}">
        <x-primary-button>
        <i class="fa-solid fa-plus m-1"></i>Cadastrar Nova Música
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
                    <th scope="col" class="px-6 py-4">Álbum</th>
                    <th scope="col" class="px-6 py-4">Gênero</th>
                    <th scope="col" class="px-6 py-4">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($musics as $music)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">
                        <td class="px-6 py-4">{{ $music->title }}</td>
                        <td>{{ $music->artist->name ?? 'Artista não encontrado' }}</td>
                        <td class="px-6 py-4">{{ $music->album->name ?? 'Álbum não encontrado' }}</td>
                        <td class="px-6 py-4">{{ $music->genre }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('musics.edit', $music->id) }}">Editar</a>
                            <a href="{{ route('musics.show', $music->id) }}">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4" >Nenhuma música no banco</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{ $musics->links() }}
    </div>
@endsection