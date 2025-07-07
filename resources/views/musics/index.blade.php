@extends('admin.users.layouts.app')

@section('title', 'Listagem das Músicas')

@section('content')

    <div class="py-6 mb-2">

    <h1 class="text-2xl font-extrabold tracking-tight text-gray-900 dark:text-gray-100 mb-4" style="font-family: 'Inter', 'Segoe UI', Arial, sans-serif;">MÚSICAS</h1>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
            <p class="text-gray-900 dark:text-gray-100">
                No <strong>HitWave</strong>, você tem acesso a uma jornada musical única: descubrindo novos sons e revivendo clássicos que combinam com cada momento do seu dia.
                Tudo isso com uma interface intuitiva, rápida e pensada para quem realmente vive a música.
            </p>
        </div>
    </div>


    @can('is-admin')
        <div class="py-6 mb-2">
            <a href="{{ route('musics.create') }}">
                <x-primary-button>
                    <i class="fa-solid fa-plus m-1"></i>Cadastrar Nova Música
                </x-primary-button>
            </a>
        </div>
    @endcan

    <x-alert />

    <div class="bg-gray-100 dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl p-6">
        <table class="w-full text-sm text-center text-gray-800 dark:text-white">
            <thead class="text-xs uppercase bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Título</th>
                    <th class="px-6 py-3">Artista</th>
                    <th class="px-6 py-3">Álbum</th>
                    <th class="px-6 py-3">Gênero</th>
                    <th class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($musics as $index => $music)
                    <tr 
                        class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-150 text-center cursor-pointer"
                        onclick="window.location='{{ route('musics.play', $music->id) }}'"
                    >
                        <td class="px-6 py-6">{{ $musics->firstItem() + $index }}</td>
                        <td class="px-6 py-6 text-left">{{ $music->title }}</td>
                        <td class="px-6 py-6 text-left">{{ $music->artist->name ?? 'Artista não encontrado' }}</td>
                        <td class="px-6 py-6 text-left">{{ $music->album->name ?? 'Álbum não encontrado' }}</td>
                        <td class="px-6 py-6 text-left">{{ $music->genre }}</td>
                        <td class="px-6 py-6">
                            <div class="flex justify-center gap-4">
                                @can('is-admin')
                                    <a href="{{ route('musics.edit', $music->id) }}" 
                                        onclick="event.stopPropagation();"
                                        class="inline-flex items-center justify-center gap-1 min-w-[100px] px-3 py-1 border border-gray-900 dark:border-gray-100 text-gray-900 dark:text-gray-100 rounded-md text-sm hover:border-white hover:text-white transition">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Editar
                                    </a>
                                @endcan

                                <a href="{{ route('musics.show', $music->id) }}" 
                                    onclick="event.stopPropagation();"
                                    class="inline-flex items-center justify-center gap-1 min-w-[100px] px-3 py-1 border border-gray-900 dark:border-gray-100 text-gray-900 dark:text-gray-100 rounded-md text-sm hover:border-white hover:text-white transition">
                                    <i class="fa-solid fa-eye"></i>
                                    Detalhes
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-6 text-gray-400 dark:text-gray-300">
                            Nenhuma música no banco
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    <div class="py-4">
        {{ $musics->links() }}
    </div>
@endsection