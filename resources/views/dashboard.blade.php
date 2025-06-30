@extends('admin.users.layouts.app')

@section('title', 'Início')

@section('content')

<div class="py-6 mb-2">

<h1 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">
     @auth
        Bem-vindo, {{ Auth::user()->name }}!
    @endauth
</h1>


<div class="py-4">
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
        <p class="text-gray-600 dark:text-gray-400">
            O <strong>HitWave</strong> é a melhor forma de escutar seus artistas preferidos, explorar álbuns incríveis e curtir músicas com facilidade e qualidade.
            Uma plataforma feita para quem ama música, com uma experiência leve, moderna e organizada.
        </p>
    </div>
</div>

<div class="py-6">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4"><strong>Artistas<strong></h2>

    <div class="flex flex-wrap gap-6">
        @forelse ($artists as $artist)
            <div class="w-[18%] bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4 flex flex-col items-center">
                <a href="{{ route('artists.show', $artist->id) }}" class="block w-full">
                    <div class="w-full h-48 mb-4 relative overflow-hidden rounded-lg">
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
            </div>
        @empty
            <div class="w-full text-center text-gray-500 dark:text-gray-400">
                Nenhum artista cadastrado.
            </div>
        @endforelse
    </div>
</div>
    <div class="py-4 flex justify-center">
        {{ $artists->links() }}
    </div>


    <div class="py-6">
    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4"><strong>Álbuns</strong></h2>

    <div class="flex flex-wrap gap-6">
        @forelse ($albums as $album)
            <div class="w-[18%] bg-white dark:bg-gray-800 shadow-sm rounded-lg p-4 flex flex-col items-center">
                <a href="{{ route('albums.show', $album->id) }}" class="block w-full">
                    <div class="w-full h-48 mb-4 relative overflow-hidden rounded-lg">
                        @if($album->image)
                            <img src="{{ asset('storage/' . $album->image) }}" alt="{{ $album->name }}" class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 dark:bg-gray-700 text-gray-400">
                                Sem imagem
                            </div>
                        @endif
                    </div>
                </a>
                <div class="text-center w-full">
                    <div class="font-semibold text-lg text-gray-800 dark:text-gray-100 truncate">{{ $album->name }}</div>
                    <div class="text-gray-600 dark:text-gray-300 text-sm truncate">
                        {{ $album->artist ? $album->artist->name : 'Artista não encontrado' }}
                    </div>
                </div>
            </div>
        @empty
            <div class="w-full text-center text-gray-500 dark:text-gray-400">
                Nenhum álbum cadastrado.
            </div>
        @endforelse
    </div>
</div>

<div class="py-4 flex justify-center">
    {{ $albums->links() }}
</div>


@endsection
