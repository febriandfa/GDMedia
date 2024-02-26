<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use App\Models\User;
use Illuminate\Http\Request;

class ProgressTugasGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progress = TugasAnswer::all();

        $tugases = Tugas::with(['subtugas.tugas_answer'])->get();

        $users = User::where('role', 'murid')->with(['tugas_answer.subtugas'])->get();

        return view('guru.progress.index', compact('progress', 'tugases', 'users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tugases = Tugas::where('id', $id)->with(['subtugas.tugas_answer'])->first();

        $users = User::where('role', 'murid')->with(['tugas_answer.subtugas'])->get();
        
        return view('guru.progress.show', compact('tugases', 'users'));
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
