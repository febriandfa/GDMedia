<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorialGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutorials = Tutorial::all();

        return view('guru.tutorial.index', compact('tutorials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.tutorial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $extension = $cover->getClientOriginalName();
            $coverName = date('YmdHis') . "." . $extension;
            $cover->move(storage_path('app/public/Tutorial/cover/'), $coverName);
        }

        $tutorials = Tutorial::create([
            'nama' => $request->input('nama'),
            'cover' => $coverName,
            'sumber' => $request->input('sumber')
        ]);

        return redirect()->route('tutorial-guru.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tutorials = Tutorial::find($id);

        return view('guru.tutorial.show', compact('tutorials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tutorials = Tutorial::find($id);

        return view('guru.tutorial.edit', compact('tutorials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tutorials = Tutorial::find($id);
        $tutorials->name = $request->name;
        $tutorials->save();

        return redirect()->route('tutorial-guru.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tutorials = Tutorial::find($id);

        if (Storage::exists('public/Tutorial/cover/' . $tutorials->cover)) {
            Storage::delete('public/Tutorial/cover/' . $tutorials->cover);
        }

        $tutorials->delete();

        return redirect()->route('tutorial-guru.index')->with('success', 'Data berhasil dihapus');
    }
}
