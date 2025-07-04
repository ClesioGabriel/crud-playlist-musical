@extends('admin.users.layouts.app')

@section('title', 'Listagem dos Álbuns')

@section('content')

    <div class="py-6 mb-2">

    <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Álbuns</h1>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <p class="text-gray-600 dark:text-gray-400">
                Explore os álbuns no <strong>HitWave</strong> e mergulhe em coleções musicais que contam histórias, marcam gerações e revelam novos talentos.
                Cada álbum é uma experiência completa, cuidadosamente organizada para você ouvir do início ao fim com qualidade e estilo.
            </p>
        </div>
    </div>

    @can('is-admin')
        <div class="py-6 mb-2">
            <a href="{{ route('albums.create') }}">
                <x-primary-button>
                    <i class="fa-solid fa-plus m-1"></i> Cadastrar Novo Álbum
                </x-primary-button>
            </a>
        </div>
    @endcan

    <x-alert />

    <div class="flex flex-wrap gap-6">
        @forelse ($albums as $album)
            <div class="w-[18%] bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4 flex flex-col items-center">
                <a href="{{ route('albums.show', $album->id) }}" class="block w-full">
                    <div class="w-[200px] h-[200px] flex items-center justify-center rounded-lg overflow-hidden mb-4 border border-gray-200 dark:border-gray-700 transition-transform transition duration-200 hover:scale-105 hover:shadow-lg">
                        @if($album->image)
                            <img src="{{ $album->image && file_exists(public_path('storage/' . $album->image)) ? asset('storage/' . $album->image) : asset('images/default-album.png') }}" alt="{{ $album->name }}"
                                class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 dark:bg-gray-700 text-gray-400">
                                Sem imagem
                            </div>
                        @endif
                    </div>
                </a>
                <div class="text-center w-full">
                    <div class="font-semibold text-lg text-gray-800 dark:text-gray-100 truncate" title="{{ $album->name }}">{{ $album->name }}</div>
                    <div class="text-gray-600 dark:text-gray-300 mb-2 truncate">
                        {{ $album->artist ? $album->artist->name : 'Artista não encontrado' }}
                    </div>
                    @can('is-admin')
                    <div class="flex justify-center space-x-3 text-xs">
                        <a href="{{ route('albums.edit', $album->id) }}" class="text-gray-600 hover:underline">Editar</a>
                    </div>
                    @endcan
                </div>
            </div>
        @empty
            <div class="w-full text-center py-8 text-gray-500 dark:text-gray-400">
                Nenhum álbum no banco.
            </div>
        @endforelse
    </div>

        <div class="py-4 flex justify-center">
            {{ $albums->links() }}
        </div>

@endsection