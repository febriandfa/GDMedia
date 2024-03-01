<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\TugasAnswer;
use Illuminate\Http\Request;

class TugasAnswerMuridController extends Controller
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
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalName();
            $fileName = date('YmdHis') . "." . $extension;
            $file->move(storage_path('app/public/TugasAnswer/file/'), $fileName);
        }

        $tugasAnswers = TugasAnswer::create([
            'user_id' => auth()->user()->id,
            'subtugas_id' => $request->input('subtugas_id'),
            'catatan' => $request->input('catatan'),
            'link' => $request->input('link'),
            'file' => $fileName,
        ]);

        return redirect()->route('subtugas.edit', $request->input('subtugas_id'));
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
