<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Music;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $playlists = $user->playlists()->with('musics')->paginate(10);
        
        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        $musics = Music::all();
        return view('playlists.create', compact('musics'));
    }

    public function store(StorePlaylistRequest $request)
    {
        $playlist = Auth::user()->playlists()->create($request->validated());

        // Salva imagem
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('playlists', 'public');
            $playlist->image = $imagePath;
            $playlist->save();
        }

        // Associa músicas (many-to-many)
        $musicIds = $request->input('music_id', []);
        $playlist->musics()->sync($musicIds);

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist criada com sucesso.');

    }

    public function edit(string $id)
    {
        $playlist = Playlist::with('musics')->findOrFail($id);
        $musics = Music::orderBy('title')->get();


        return view('playlists.edit', compact('playlist', 'musics'));
    }

    public function update(UpdatePlaylistRequest $request, string $id)
    {
        $playlist = Playlist::findOrFail($id);

        $playlist->update($request->only(['name', 'description']));

        if ($request->hasFile('image')) {
            if ($playlist->image) {
                Storage::disk('public')->delete($playlist->image);
            }
            $imagePath = $request->file('image')->store('playlists', 'public');
            $playlist->image = $imagePath;
            $playlist->save();
        }

        // Atualiza músicas na playlist
        $musicIds = $request->input('music_id', []);
        $playlist->musics()->sync($musicIds);

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist atualizada com sucesso.');

    }

    public function show(string $id)
    {
        $playlist = Playlist::with('musics')->findOrFail($id);
        return view('playlists.show', compact('playlist'));
    }

    public function destroy(string $id)
    {
        $playlist = Playlist::findOrFail($id);

        if ($playlist->image) {
            Storage::disk('public')->delete($playlist->image);
        }

        $playlist->musics()->detach(); // remove da tabela music_playlist

        $playlist->delete();

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist deletada com sucesso.');
    }
}
