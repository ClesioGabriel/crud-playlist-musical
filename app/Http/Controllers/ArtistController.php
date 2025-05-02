<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::paginate(15);
        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(StoreArtistRequest $request)
    {
        Artist::create($request->validated());

        return redirect()
            ->route('artists.index')
            ->with('success', 'Artista criado com sucesso.');
    }

    public function edit(string $id)
    {
        if (!$artist = Artist::find($id)) {
            return redirect()
                ->route('artists.index')
                ->with('warning', 'Artista não encontrado.');
        }

        return view('artists.edit', compact('artist'));
    }

    public function update(UpdateArtistRequest $request, string $id)
    {
        $artist = Artist::findOrFail($id);
    
        $artist->update($request->validated());
    
        return redirect()
            ->route('artists.index')
            ->with('success', 'Artista atualizado com sucesso.');
    }
    

    public function show(string $id)
    {
        if (!$artist = Artist::find($id)) {
            return redirect()
                ->route('artists.index')
                ->with('warning', 'Artista não encontrado.');
        }
        return view('artists.show', compact('artist'));
    }

    public function destroy(string $id)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $artist = Artist::find($id);

        if (!$artist) {
            return redirect()
                ->route('artists.index')
                ->with('warning', 'Artista não encontrado.');
        }

        $artist->delete();

        return redirect()
            ->route('artists.index')
            ->with('success', 'Artista deletado com sucesso.');
    }
}