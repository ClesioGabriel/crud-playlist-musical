@extends('admin.users.layouts.app')

@section('title', 'Cadastrar Nova Música')

@section('content')
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
        Nova Música
    </h2>
</div>

    <form action="{{ route('musics.store') }}" method="POST" class="space-y-4">
        @csrf
        @include('musics.partials.form')
    </form>
@endsection


