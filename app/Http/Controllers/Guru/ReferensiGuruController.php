<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Referensi;
use Illuminate\Http\Request;

class ReferensiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $referensis = Referensi::all();

        return view('guru.referensi.index', compact('referensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.referensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Referensi::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('referensi-guru.index')->with('success', 'Data Referensi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $referensis = Referensi::findOrFail($id);

        return view('guru.referensi.show', compact('referensis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $referensis = Referensi::findOrFail($id);
        return view('guru.referensi.edit', compact('referensis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $referensis = Referensi::find($id);
        $referensis->name = $request->name;
        $referensis->save();

        return redirect()->route('referensi-guru.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $referensis = Referensi::find($id);
        $referensis->delete();

        return redirect()->route('referensi-guru.index')->with('success', 'Data Berhasil dihapus');
    }
}
