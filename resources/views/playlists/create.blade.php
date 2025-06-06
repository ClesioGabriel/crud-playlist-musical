@extends('admin.users.layouts.app')

@section('title', 'Cadastrar Nova Playlist')

@section('content')
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
        Nova Playlist
    </h2>
</div>

    <form action="{{ route('playlists.store') }}" method="POST" class="space-y-4">
        @csrf
        @include('playlists.partials.form')
    </form>
@endsection


