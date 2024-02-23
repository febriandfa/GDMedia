<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\TutorialTersimpan;
use Illuminate\Http\Request;

class TutorialTersimpanMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tutorialTersimpans = TutorialTersimpan::where('user_id', auth()->user()->id)->with(['tutorial', 'user'])->get();

        // dd($tutorialTersimpans);

        return view('murid.tutorial-tersimpan.index', compact('tutorialTersimpans'));
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
        $tutorialTersimpans = TutorialTersimpan::create([
            'user_id' => auth()->user()->id,
            'tutorial_id' => $request->input('tutorial_id'),
            'status' => 'Tersimpan'
        ]);

        return redirect()->route('tutorial.index');
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
