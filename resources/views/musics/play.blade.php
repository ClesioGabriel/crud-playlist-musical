@extends('admin.users.layouts.app')

@section('title', 'Reprodução da Música')

@section('content')

<div class="py-4"></div>

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-4">Título</th>
                    <th scope="col" class="px-6 py-4">Artista</th>
                    <th scope="col" class="px-6 py-4">Álbum</th>
                    <th scope="col" class="px-6 py-4">Gênero</th>
                    <th scope="col" class="px-6 py-4">Ações</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="py-4">
        {{ $musics->links() }}
    </div>


<div class="py-1"></div>
    
    <button type="button" class="like-button" data-music-id="{{ $music->id }}">
        <svg class="w-6 h-6 heart-icon" data-music-id="{{ $music->id }}"
            fill="{{ $music->likes->contains('user_id', auth()->id()) ? '#e3342f' : 'none' }}"
            stroke="#e3342f"
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                    C2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09
                    C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5
                    c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
        </svg>
    </button>






    <div class="music-footer flex items-center justify-center gap-6 text-white flex items-center gap-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">

        @foreach($musics as $music)
            <p>{{ $music->titulo }}</p>
            <audio controls>
                <source src="{{ asset('storage/' . $music->file_path) }}" type="audio/mpeg">
                Seu navegador não suporta o player de áudio.
            </audio>
        @endforeach


        <a href="{{ route('musics.index') }}">
            <x-primary-button>
                {{ __('Voltar') }}
            </x-primary-button>
        </a>
    </div>
@endsection

@push('styles')
<style>
    .music-footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: #1f2937; /* Tailwind: bg-gray-800 */
        color: #ffffff;
        padding: 12px 24px;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.25);
        z-index: 9999;
        border-top: 4px solid #4f46e5; /* Tailwind: indigo-600 */
    }

    .music-footer audio {
        max-width: 250px;
    }

    .music-footer a {
        flex-shrink: 0;
    }
</style>
@endpush

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.like-button').click(function () {
            let musicId = $(this).data('music-id');
            let $svg = $(`.heart-icon[data-music-id="${musicId}"]`);

            $.ajax({
                url: `/musics/${musicId}/toggle-like`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.liked) {
                        $svg.attr('fill', '#e3342f');
                    } else {
                        $svg.attr('fill', 'none');
                    }
                },
                error: function () {
                    alert('Erro ao curtir/descurtir. Tente novamente.');
                }
            });
        });
    });
</script>
@endpush
