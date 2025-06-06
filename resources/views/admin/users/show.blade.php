@extends('admin.users.layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')
    <div class="py-6">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-2">
            Detalhes do Usuário {{ $user->name }}
        </h2>
    </div>
    <ul class="max-w-md space-y-2 text-gray-500 list-disc list-inside dark:text-gray-400 mb-6">
        <li>Nome: {{ $user->name }}</li>
        <li>E-mail: {{ $user->email }}</li>
    </ul>
    <x-alert />

    {{-- @can('owner', $user)
        pode deletar
    @endcan --}}


    <div class="flex items-center gap-4 mt-6">
    <a href="{{ route('users.index') }}">
        <x-primary-button>
            {{ __('Voltar') }}
        </x-primary-button>
    </a>

    @can('is-admin')
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')">
            @csrf
            @method('delete')
            <x-danger-button type="submit">
                {{ __('Deletar Usuário') }}
            </x-danger-button>
        </form>
    @endcan
</div>



@endsection