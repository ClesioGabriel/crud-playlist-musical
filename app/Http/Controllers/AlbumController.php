<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;

use App\Models\Artist;

class AlbumController extends Controller
{
    public function index()
    {
    $albums = Album::with('artist')->paginate(15);
    return view('albums.index', compact('albums'));
    }


    public function create()
    {
    $artists = Artist::all(); // ou ->orderBy('name')->get();
    return view('albums.create', compact('artists'));
    }

    public function store(StoreAlbumRequest $request)
    {
        Album::create($request->validated());

        return redirect()
            ->route('albums.index')
            ->with('success', 'Álbum criado com sucesso.');
    }

    public function edit(string $id)
    {
        if (!$album = Album::find($id)) {
            return redirect()
                ->route('albums.index')
                ->with('warning', 'Álbum não encontrado.');
        }

        $artists = Artist::all();

        return view('albums.edit', compact('album', 'artists'));
    }

    public function update(UpdateAlbumRequest $request, string $id)
    {
        if (!$album = Album::find($id)) {
            return back()
                ->with('warning', 'Álbum não encontrado.');
        }
        $data = $request->only(['name', 'artist', 'genre']);
        $album->update($data);

        return redirect()
            ->route('albums.index')
            ->with('success', 'Álbum atualizado com sucesso.');
    }

    public function show(string $id)
    {
        $album = Album::with('musics')->find($id);

        if (!$album) {
            return redirect()
                ->route('albums.index')
                ->with('warning', 'Álbum não encontrado.');
        }

        return view('albums.show', compact('album'));
}


    public function destroy(string $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $album = Album::find($id);

        if (!$album) {
            return redirect()
                ->route('albums.index')
                ->with('warning', 'Álbum não encontrado.');
        }

        $album->delete();

        return redirect()
            ->route('albums.index')
            ->with('success', 'Álbum deletado com sucesso.');
    }
}