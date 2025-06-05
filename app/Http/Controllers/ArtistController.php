<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

use App\Models\Album;

class ArtistController extends Controller
{
    public function index()
    {
        $artists = Artist::with('albums')->paginate(15);
        return view('artists.index', compact('artists'));
    }


    public function create()
    {
        $albums = Album::all(); // ou ->orderBy('name')->get()
        return view('artists.create', compact('albums'));
    }

    public function store(StoreArtistRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image')->store('artists', 'public');
            $data['image'] = $image;
        }

        Artist::create($data);

        return redirect()
            ->route('artists.index')
            ->with('success', 'Artista criado com sucesso.');
    }


    public function edit(string $id)
{
    $artist = Artist::findOrFail($id);
    $albums = Album::all();

    return view('artists.edit', compact('artist', 'albums'));
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

        // Verifica se o artista está vinculado a algum álbum
        if ($artist->albums()->exists()) {
            return redirect()
                ->route('artists.index')
                ->with('error', 'Não é possível deletar o artista pois ele está vinculado a um ou mais álbuns.');
        }

        $artist->delete();

        return redirect()
            ->route('artists.index')
            ->with('success', 'Artista deletado com sucesso.');
    }

}