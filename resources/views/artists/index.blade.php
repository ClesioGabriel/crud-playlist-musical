@extends('admin.users.layouts.app')

@section('title', 'Listagem dos Artistas')


@section('content')
    <div class="py-6 mb-2">

        <a href="{{ route('artists.create') }}">
        <x-primary-button>
        <i class="fa-solid fa-plus m-1"></i>Cadastrar Novo Artista
        </x-primary-button>
        </a>


    </div>

    <x-alert />

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">Imagem</th>
                    <th scope="col" class="px-6 py-4">Nome</th>
                    <th scope="col" class="px-6 py-4">Álbum</th>
                    <th scope="col" class="px-6 py-4">Gênero</th>
                    <th scope="col" class="px-6 py-4">Ações</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @forelse ($artists as $artist)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 text-center">

                        <td class="px-6 py-4 text-center">
                            @if($artist->image)
                                <img src="{{ asset('storage/' . $artist->image) }}"  class="w-16 h-16 rounded-full object-cover" style="max-width: 100px; max-height: 100px;">
                            @else
                                <span>Sem imagem</span>
                            @endif
                        </td>

                        <td class="px-6 py-4">{{ $artist->name }}</td>
                        <td class="px-6 py-4">
                            @if ($artist->albums->isNotEmpty())
                                @foreach ($artist->albums as $album)
                                    <span class="block">{{ $album->name }}</span>
                                @endforeach
                            @else
                                Nenhum álbum associado
                            @endif
                        </td>
                        <td class="px-6 py-4">{{ $artist->genre }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('artists.edit', $artist->id) }}">Editar</a>
                            <a href="{{ route('artists.show', $artist->id) }}">Detalhes</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Nenhum artista no banco</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{ $artists->links() }}
    </div>
@endsection