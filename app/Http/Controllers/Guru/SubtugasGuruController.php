<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Subtugas;
use Illuminate\Http\Request;

class SubtugasGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $subtugases = Subtugas::create([
            'tugas_id' => $request->input('tugas_id'),
            'tahap' => $request->input('tahap'),
            'deskripsi' => $request->input('deskripsi')
        ]);

        return redirect()->route('tugas-guru.edit', $request->input('tugas_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $subtugases = Subtugas::find($id);

        $subtugasesUpdate = $request->all();

        $subtugases->update($subtugasesUpdate);

        return redirect()->route('tugas-guru.edit', $subtugases->tugas_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subtugases = Subtugas::find($id);

        $subtugases->delete();

        return redirect()->route('tugas-guru.edit', $subtugases->tugas_id);
    }
}
