<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use App\Models\Referensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReferensiGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $referensis = Referensi::when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })
            ->get();

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
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $extension = $gambar->getClientOriginalName();
            $gambarName = date('YmdHis') . "." . $extension;
            $gambar->move(storage_path('app/public/Referensi/gambar/'), $gambarName);
        }

        $referensis = Referensi::create([
            'nama' => $request->input('nama'),
            'sumber' => $request->input('sumber'),
            'gambar' => $gambarName
        ]);

        $notifikasis = Notifikasi::create([
            'pesan' => auth()->user()->name . ' Telah Memposting Referensi Baru!',
            'oleh' => 'Guru'
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

        if (Storage::exists('public/Referensi/gambar/' . $referensis->gambar)) {
            Storage::delete('public/Referensi/gambar/' . $referensis->gambar);
        }

        $referensis->delete();

        return redirect()->route('referensi-guru.index')->with('success', 'Data Berhasil dihapus');
    }
}
