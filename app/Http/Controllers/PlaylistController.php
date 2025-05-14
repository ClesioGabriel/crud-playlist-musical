<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::paginate(15);
        return view('playlists.index', compact('playlists'));
    }

    public function create()
    {
        return view('playlists.create');
    }

    public function store(StorePlaylistRequest $request)
    {
        Playlist::create($request->validated());

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist criada com sucesso.');
    }

    public function edit(string $id)
    {
        if (!$playlist = Playlist::find($id)) {
            return redirect()
                ->route('playlists.index')
                ->with('warning', 'Playlist não encontrada.');
        }

        return view('playlists.edit', compact('playlist'));
    }

    public function update(UpdatePlaylistRequest $request, string $id)
    {
        if (!$playlist = Playlist::find($id)) {
            return back()
                ->with('warning', 'Playlist não encontrada.');
        }
        $data = $request->only(['name', 'description']);
        $playlist->update($data);

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist atualizada com sucesso.');
    }

    public function show(string $id)
    {
        if (!$playlist = Playlist::find($id)) {
            return redirect()
                ->route('playlists.index')
                ->with('warning', 'Playlist não encontrada.');
        }
        return view('playlists.show', compact('playlist'));
    }

    public function destroy(string $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $playlist = Playlist::find($id);

        if (!$playlist) {
            return redirect()
                ->route('playlists.index')
                ->with('warning', 'Playlist não encontrada.');
        }

        $playlist->delete();

        return redirect()
            ->route('playlists.index')
            ->with('success', 'Playlist deletada com sucesso.');
    }
}