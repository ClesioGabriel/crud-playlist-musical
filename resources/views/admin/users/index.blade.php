@extends('admin.users.layouts.app')

@section('title', 'Listagem dos Usuários')


@section('content')
    <div class="py-6 mb-2">

        <a href="{{ route('users.create') }}"
        <x-primary-button>
        <i class="fa-solid fa-plus m-1"></i>Cadastrar Novo Usuário
        </x-primary-button>
        </a>


    </div>

    <x-alert />

    <div class="bg-gray-100 dark:bg-gray-900 overflow-hidden shadow-lg sm:rounded-xl p-6">
        <table class="w-full text-sm text-center text-gray-800 dark:text-white">
            <thead class="text-xs uppercase bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3 text-left">Nome</th>
                    <th class="px-6 py-3 text-left">E-mail</th>
                    <th class="px-6 py-3">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr class="border-b border-gray-300 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-800 transition-colors duration-150 text-center">
                        <td class="px-6 py-6">{{ $users->firstItem() + $index }}</td>
                        <td class="px-6 py-6 text-left">{{ $user->name }}</td>
                        <td class="px-6 py-6 text-left">{{ $user->email }}</td>
                        <td class="px-6 py-6">
                            <div class="flex justify-center gap-4">
                                <a href="{{ route('users.edit', $user->id) }}" 
                                onclick="event.stopPropagation();"
                                class="inline-flex items-center justify-center gap-1 min-w-[100px] px-3 py-1 border border-gray-900 dark:border-gray-100 text-gray-900 dark:text-gray-100 rounded-md text-sm hover:border-white hover:text-white transition">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Editar
                                </a>

                                <a href="{{ route('users.show', $user->id) }}" 
                                onclick="event.stopPropagation();"
                                class="inline-flex items-center justify-center gap-1 min-w-[100px] px-3 py-1 border border-gray-900 dark:border-gray-100 text-gray-900 dark:text-gray-100 rounded-md text-sm hover:border-white hover:text-white transition">
                                    <i class="fa-solid fa-eye"></i>
                                    Detalhes
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-6 text-gray-400 dark:text-gray-300">
                            Nenhum usuário no banco
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="py-4">
        {{ $users->links() }}
    </div>
@endsection