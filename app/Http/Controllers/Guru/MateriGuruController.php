<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;

class MateriGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materis = Materi::all();

        return view('guru.materi.index', compact('materis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Materi::create([
            'nama' => $request->input('nama')
        ]);

        return redirect()->route('materi-guru.index')->with('success', 'Data Materi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materis = Materi::find($id)->firstOrFail();


        return view('materi.guru.show', compact('materis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $materis = Materi::find($id)->firstOrFail();
        return view('materi.guru.edit', compact('materis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $materis = Materi::find($id);
        $materis->name = $request->name;
        $materis->save();

        return redirect()->route('materi-guru.index')->with('success', 'Data Materi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $materis = Materi::find($id);
        $materis->delete();
        return redirect()->route('materi-guru.index')->with('success', 'Data Materi berhasil dihapus');
    }
}
