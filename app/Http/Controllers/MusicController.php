<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMusicRequest;
use App\Http\Requests\UpdateMusicRequest;
use App\Models\Artist;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::paginate(15);

        $likedPlaylist = auth()->user()->playlists()->where('name', 'Curtidas')->first();
        $likedMusicIds = auth()->user()->likedMusics()->pluck('music_id')->toArray();

        return view('musics.index', compact('musics', 'likedMusicIds'));
    }

    public function create()
    {
        $artists = Artist::all();
        $albums = Album::all();
        return view('musics.create', compact('artists', 'albums'));
    }

    public function store(StoreMusicRequest $request)
{
    try {
        if (!$request->hasFile('file_path')) {
            return back()->withErrors(['file_path' => 'Arquivo não enviado']);
        }

        $file = $request->file('file_path');
        $fileName = uniqid() . '_' . time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('musics', $fileName, 'public');

        Music::create([
            'title' => $request->title,
            'artist_id' => $request->artist_id,
            'album_id' => $request->album_id,
            'genre' => $request->genre,
            'file_path' => 'storage/' . $filePath,
            'release_date' => $request->release_date,
        ]);

        return redirect()
            ->route('musics.index')
            ->with('success', 'Música enviada com sucesso!');

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Erro ao salvar a música: ' . $e->getMessage()]);
    }
}

    public function edit(string $id)
    {
        if (!$music = Music::find($id)) {
            return redirect()->route('musics.index')->with('warning', 'Música não encontrada.');
        }

        $artists = Artist::all();
        $albums = Album::all();

        return view('musics.edit', compact('music', 'artists', 'albums'));
    }

    public function update(UpdateMusicRequest $request, string $id)
    {
        $music = Music::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = uniqid() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('musics', $fileName, 'public');
            $data['file_path'] = 'storage/' . $filePath;

            // Deleta o antigo, se existir
            if ($music->file_path && \Storage::exists(str_replace('storage/', 'public/', $music->file_path))) {
                \Storage::delete(str_replace('storage/', 'public/', $music->file_path));
            }
        }

        $music->update($data);

        return redirect()
            ->route('musics.index')
            ->with('success', 'Música atualizada com sucesso.');
    }

    public function show(string $id)
    {
        if (!$music = Music::find($id)) {
            return redirect()->route('musics.index')->with('warning', 'Música não encontrada.');
        }

        return view('musics.show', compact('music'));
    }

    public function destroy(string $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $music = Music::find($id);

        if (!$music) {
            return redirect()->route('musics.index')->with('warning', 'Música não encontrada.');
        }

        if ($music->file_path && Storage::exists(str_replace('storage/', 'public/', $music->file_path))) {
            Storage::delete(str_replace('storage/', 'public/', $music->file_path));
        }

        if ($music->playlists()->exists()) {
            return redirect()->route('musics.index')
                ->with('error', 'Não é possível deletar uma música que está em uma playlist.');
        }

        $music->delete();

        return redirect()->route('musics.index')->with('success', 'Música deletada com sucesso.');
    }

    public function play(string $id)
    {
        if (!$music = Music::find($id)) {
            return redirect()->route('musics.index')->with('warning', 'Música não encontrada.');
        }

        $likedMusicIds = auth()->user()->likedMusics()->pluck('music_id')->toArray();

        $musics = Music::paginate(10);

        return view('musics.play', compact('music', 'likedMusicIds'));
    }

    public function like(Music $music)
    {
        $user = auth()->user();

        $likedPlaylist = $user->playlists()->firstOrCreate(
            ['name' => 'Curtidas'],
            ['description' => 'Músicas curtidas pelo usuário']
        );

        if (!$likedPlaylist->musics->contains($music->id)) {
            $likedPlaylist->musics()->attach($music->id);
        }

        return back()->with('success', 'Música curtida e adicionada à playlist Curtidas!');
    }


    public function unlike(Music $music)
    {
        $user = auth()->user();

        $likedPlaylist = $user->playlists()->where('name', 'Curtidas')->first();

        if ($likedPlaylist) {
            $likedPlaylist->musics()->detach($music->id);
        }

        return back()->with('success', 'Música removida da playlist Curtidas!');
    }



    public function dashboard()
    {
        $user = auth()->user();
        $favoritas = $user->likedMusics()->with('album', 'artist')->get();
        return view('admin.users.dashboard', compact('favoritas'));
    }
}
