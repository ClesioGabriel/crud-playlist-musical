@extends('admin.users.layouts.app')

@section('title', 'Editar o Usuário')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Editar o Usuário {{ $user->name }}
        </h2>
    </div>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @method('put')
        @include('admin.users.partials.form')
    </form>
@endsection