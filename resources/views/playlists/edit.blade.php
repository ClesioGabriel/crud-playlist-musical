@extends('admin.users.layouts.app')

@section('title', 'Editar a Playlist')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Editar a Playlist {{ $playlist->name }}
        </h2>
    </div>
    <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
        @method('put')
        @include('playlists.partials.form')
    </form>
@endsection