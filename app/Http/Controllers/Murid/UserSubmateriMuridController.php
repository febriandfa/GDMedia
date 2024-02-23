<?php

namespace App\Http\Controllers\Murid;

use App\Http\Controllers\Controller;
use App\Models\UserSubmateri;
use Illuminate\Http\Request;

class UserSubmateriMuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userSubmateris = UserSubmateri::with('submateri', 'user')->get();
        
    return response()->json(['success' => true, 'data' => $userSubmateris, 'message' => 'Berhasil']);
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
        $userSubmateris = UserSubmateri::create([
            'submateri_id' => $request->input('submateri_id'),
            'user_id' => auth()->user()->id,
            'status' => 'Selesai'
        ]);

        return response()->json(['success' => true, 'data' => $userSubmateris, 'message' => 'Berhasil']);
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
