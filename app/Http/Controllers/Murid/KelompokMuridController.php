<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelompok;
use App\Models\User;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;

class KelompokMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelompoks = Kelompok::all();

        return view('murid.kelompok.index', compact('kelompoks'));
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
        $kelompok = User::find($request->id);
        $kelompok->kelompok_id = $request->kelompok_id;
        $kelompok->save();
        return redirect()->route('tugas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kelompok = User::where('kelompok_id', $id)->with('kelompok')->get();

        $anggota = $kelompok->map(function ($kelompok) {
            return $kelompok->name;
        });

        $tugases = Tugas::all();
        return view('murid.kelompok.show', compact('kelompok', 'tugases', 'anggota'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
