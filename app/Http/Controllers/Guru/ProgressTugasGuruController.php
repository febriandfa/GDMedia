<?php

namespace App\Http\Controllers\Guru;

use App\Exports\TugasNilaiExport;
use App\Http\Controllers\Controller;
use App\Models\Subtugas;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use App\Models\TugasNilai;
use App\Models\User;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel;

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
        $nilais = TugasNilai::create([
            'murid_id' => $request->input('murid_id'),
            'kelompok_id' => $request->input('kelompok_id'),
            'tugas_id' => $request->input('tugas_id'),
            'nilai' => $request->input('nilai'),
            'feedback' => $request->input('feedback')
        ]);

        return redirect()->route('progress-guru.show', $request->input('murid_id'));
    }

    /**
     * Display the specified resource.
     */
    public function show($user_id)
    {
        $tugases = Tugas::with(['subtugas.tugas_answer', 'tugas_nilai.kelompok.user', 'tugas_nilai.user'])->get();

        $answers = TugasAnswer::where('user_id', $user_id)->with(['user', 'subtugas'])->get();

        return view('guru.progress.show', compact('tugases', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $answers = TugasAnswer::where('id', $id)->with(['user', 'subtugas'])->first();

        $answerAlls = TugasAnswer::with(['subtugas.tugas'])->get();

        $tugases = Tugas::with(['subtugas.tugas_answer'])->get();

        return view('guru.progress.edit', compact('answers', 'tugases', 'answerAlls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $answers = TugasAnswer::find($id);

        $answersUpdate = $request->only(['feedback']);

        $answers->update($answersUpdate);

        return redirect()->route('progress-guru.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function indexMurid($id)
    {
        $tugases = Tugas::where('id', $id)->with(['subtugas.tugas_answer', 'tugas_nilai.kelompok.user', 'tugas_nilai.user', 'tugas_nilai.tugas'])
            ->first();

        $subtugases = Subtugas::where('tugas_id', $id)->with(['tugas', 'tugas_answer'])->get();

        $answers = TugasAnswer::with(['subtugas.tugas'])->get();

        $users = User::where('role', 'murid')
            ->sortBy(function ($user) {
                return $user->name;
            })
            ->with(['tugas_answer.subtugas'])->get();

        return view('guru.progress.indexMurid', compact('tugases', 'users', 'subtugases', 'answers'));
    }

    public function exportPdf($id)
    {
        return Excel::download(new TugasNilaiExport($id), 'data_tugas.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }
}
