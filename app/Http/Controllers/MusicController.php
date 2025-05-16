<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMusicRequest;
use App\Http\Requests\UpdateMusicRequest;

use App\Models\Artist;
use App\Models\Album;

class MusicController extends Controller
{
    public function index()
    {
        $musics = Music::paginate(15);
        return view('musics.index', compact('musics'));
    }

    public function create()
    {
        $artists = Artist::all();
        $albums = Album::all();
        return view('musics.create', compact('artists', 'albums'));
    }

    public function store(StoreMusicRequest $request)
    {
    $data = $request->validated();

    if ($request->hasFile('file_path')) {
        $file = $request->file('file_path');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('musics', $fileName, 'public');

        $data['file_path'] = $filePath;
    }

    Music::create($data);

    return redirect()->route('musics.index')->with('success', 'Música criada com sucesso!');
    }


    public function edit(string $id)
    {
        if (!$music = Music::find($id)) {
            return redirect()
                ->route('musics.index')
                ->with('warning', 'Música não encontrada.');
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
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('musics', $fileName, 'public');

                $data['file_path'] = $filePath;

                // Opcional: excluir arquivo antigo
                if ($music->file_path && \Storage::disk('public')->exists($music->file_path)) {
                    \Storage::disk('public')->delete($music->file_path);
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
            return redirect()
                ->route('musics.index')
                ->with('warning', 'Música não encontrada.');
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
            return redirect()
                ->route('musics.index')
                ->with('warning', 'Música não encontrada.');
        }

        $music->delete();

        return redirect()
            ->route('musics.index')
            ->with('success', 'Música deletada com sucesso.');
    }
}