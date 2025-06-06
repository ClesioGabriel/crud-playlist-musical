@extends('admin.users.layouts.app')

@section('title', 'Criar Novo Artista')

@section('content')
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
        Novo Artista
    </h2>
</div>

    <form action="{{ route('artists.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @include('artists.partials.form')
    </form>
@endsection


