@extends('admin.users.layouts.app')

@section('title', 'Detalhes do Usuário')

@section('content')

    <div class="py-4"></div>

    <div class="py-4">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 max-w-md mb-4">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-4">
                Detalhes do Usuário: {{ $user->name }}
            </h2>

            <ul class="space-y-2 list-disc list-inside text-gray-700 dark:text-gray-300">
                <li><strong>Nome:</strong> {{ $user->name }}</li>
                <li><strong>E-mail:</strong> {{ $user->email }}</li>
            </ul>
        </div>
    </div>

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