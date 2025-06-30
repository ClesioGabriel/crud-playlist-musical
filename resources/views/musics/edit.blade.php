@extends('admin.users.layouts.app')

@section('title', 'Editar a Música')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Editar a Música {{ $music->name }}
        </h2>
    </div>
    <form action="{{ route('musics.update', $music->id) }}" method="POST">
        @method('put')
        @csrf
        @include('musics.partials.form')
    </form>
@endsection