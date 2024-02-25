<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Submateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmateriGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $submateris = Submateri::with(['status_murid', 'status_murid.user'])->get();

        // return view('guru.submateri.index', compact('submateris'));
        return response()->json(['success' => true, 'data' => $submateris, 'message' => 'Berhasil']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.submateri.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalName();
            $fileName = date('YmdHis') . "." . $extension;
            $file->move(storage_path('app/public/Submateri/file/'), $fileName);
        }

        $submateris = Submateri::create([
            'materi_id' => $request->input('materi_id'),
            'nama' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
            'file' => $fileName
        ]);

        return redirect()->route('materi-guru.show', $request->input('materi_id'));
        // return response()->json(['success' => true, 'data' => $submateris, 'message' => 'Berhasil']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $submateris = Submateri::where('id', $id)->with(['materi'])->first();

        // return view('guru.submateri.show', compact('submateris'));
        return response()->json(['success' => true, 'data' => $submateris, 'message' => 'Berhasil']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $submateris = Submateri::where('id', $id)->first();

        return view('guru.submateri.edit', compact('submateris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $submateris = Submateri::find($id);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalName();
            $fileName = date('YmdHis') . "." . $extension;
            $file->move(storage_path('app/public/Materi/file/'), $fileName);
        } else {
            $fileName = $submateris->file;
        }

        $submaterisUpdate = $request->all();
        $submaterisUpdate['file'] = $fileName;

        $submateris->update($submaterisUpdate);

        return response()->json(['success' => true, 'data' => $submateris, 'message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $submateris = Submateri::find($id);

        $submateris->delete();

        return redirect()->route('submateri-guru.index')->with('success', 'Data Materi berhasil dihapus');
    }
}
