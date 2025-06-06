@extends('admin.users.layouts.app')

@section('title', 'Início')

@section('content')  
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Favoritas</h2>
                
                @if($favoritas->isEmpty())
                    <p class="text-gray-600 dark:text-gray-400 mt-4">Nenhuma música favorita ainda.</p>
                @else
                    <ul class="mt-4 space-y-2">
                        @foreach ($favoritas as $music)
                            <li class="flex items-center justify-between">
                                <div>
                                    <span class="font-semibold">{{ $music->title }}</span>
                                    <span class="text-sm text-gray-400"> — {{ $music->artist->name ?? 'Artista' }}</span>
                                </div>
                                <a href="{{ route('musics.show', $music->id) }}" class="text-indigo-500 hover:underline">Ouvir</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
