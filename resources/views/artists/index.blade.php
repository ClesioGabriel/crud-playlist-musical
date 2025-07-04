@extends('admin.users.layouts.app')

@section('title', 'Listagem dos Artistas')

@section('content')

    <div class="py-6 mb-2">

    <h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Artistas</h1>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <p class="text-gray-600 dark:text-gray-400">
                Conheça os artistas no <strong>HitWave</strong> e descubra quem está por trás das músicas que você ama. Acompanhe discografias, biografias e novidades dos seus músicos favoritos — tudo em um só lugar, com praticidade e estilo.
            </p>
        </div>
    </div>

    @can('is-admin')
        <div class="py-6 mb-2">
            <a href="{{ route('artists.create') }}">
                <x-primary-button>
                    <i class="fa-solid fa-plus m-1"></i>Cadastrar Novo Artista
                </x-primary-button>
            </a>
        </div>
    @endcan

    <x-alert />

    <div class="flex flex-wrap gap-6">
        @forelse ($artists as $artist)
            <div>
                <a href="{{ route('artists.show', $artist->id) }}" class="block w-full">
                    <div class="w-24 h-24 mb-4 relative overflow-hidden rounded-full border border-gray-300 dark:border-gray-600">
                        @if($artist->image)
                            <img src="{{ asset('storage/' . $artist->image) }}" alt="{{ $artist->name }}" class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 dark:bg-gray-700 text-gray-400">
                                Sem imagem
                            </div>
                        @endif
                    </div>
                </a>
                <div class="text-center w-full">
                    <div class="font-semibold text-lg text-gray-800 dark:text-gray-100 truncate">{{ $artist->name }}</div>
                </div>
                @can('is-admin')
                    <div class="flex justify-center space-x-3 text-xs">
                        <a href="{{ route('artists.edit', $artist->id) }}" class="text-gray-600 hover:underline">Editar</a>
                    </div>
                @endcan
            </div>
        @empty
            <div class="w-full text-center text-gray-500 dark:text-gray-400">
                Nenhum artista cadastrado.
            </div>
        @endforelse
    </div>

    <div class="py-4">
        {{ $artists->links() }}
    </div>
@endsection