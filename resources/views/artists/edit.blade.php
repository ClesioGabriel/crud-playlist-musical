@extends('admin.users.layouts.app')

@section('title', 'Editar o Artista')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Editar o Artista {{ $artist->name }}
        </h2>
    </div>
    <form action="{{ route('artists.update', $artist->id) }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @include('artists.partials.form')
    </form>
@endsection