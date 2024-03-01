<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Tugas;
use App\Models\TugasAnswer;
use App\Models\UserSubmateri;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function guru()
    {
        return view('guru.dashboard');
    }

    public function murid()
    {
        $materis = Materi::with(['submateri.status_murid'])->get();

        $tugases = Tugas::with(['subtugas.tugas_answer'])->get();

        $userMateris = UserSubmateri::with(['submateri.tugas'])->latest('updated_at')->first();

        $answers = TugasAnswer::with(['subtugas.tugas'])->latest('updated_at')->first();

        return view('murid.dashboard', compact('materis', 'tugases', 'userMateris', 'answers'));
    }
}
