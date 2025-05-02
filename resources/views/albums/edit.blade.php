@extends('admin.users.layouts.app')

@section('title', 'Editar o Álbum')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Editar o Álbum {{ $album->name }}
        </h2>
    </div>
    <form action="{{ route('albums.update', $album->id) }}" method="POST">
        @method('put')
        @include('albums.partials.form')
    </form>
@endsection