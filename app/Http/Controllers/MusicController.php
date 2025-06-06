<?php

namespace App\Http\Controllers;

use App\Models\Music;
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

        // Deleta o arquivo
        if ($music->file_path && Storage::exists(str_replace('storage/', 'public/', $music->file_path))) {
            Storage::delete(str_replace('storage/', 'public/', $music->file_path));
        }

        $music->delete();

        return redirect()->route('musics.index')->with('success', 'Música deletada com sucesso.');
    }

    public function play(string $id)
    {
        if (!$music = Music::find($id)) {
            return redirect()->route('musics.index')->with('warning', 'Música não encontrada.');
        }

        $musics = Music::paginate(10);

        return view('musics.play', compact('music'));
    }

    public function toggleLike($musicId)
    {
        $user = auth()->user();
        $music = Music::findOrFail($musicId);

        $existingLike = $music->likes()->where('user_id', $user->id)->first();

        if ($existingLike) {
            $existingLike->delete();
            $liked = false;
        } else {
            $music->likes()->create(['user_id' => $user->id]);
            $liked = true;
        }

        return response()->json(['liked' => $liked]);
    }

    public function dashboard()
    {
        $user = auth()->user();
        $favoritas = $user->likedMusics()->with('album', 'artist')->get();
        return view('admin.users.dashboard', compact('favoritas'));
    }
}
