@extends('admin.users.layouts.app')

@section('title', 'Criar Novo Usuário')

@section('content')
<div class="py-6">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
        Novo Usuário
    </h2>
</div>

    <form action="{{ route('users.store') }}" method="POST" class="space-y-4">
        @csrf
        @include('admin.users.partials.form')
    </form>
@endsection


