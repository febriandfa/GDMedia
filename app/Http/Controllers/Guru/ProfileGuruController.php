<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ProfileGuruController extends Controller
{
    public function index()
    {
        $users = Auth::user();

        return view('guru.profile.edit', compact('users'));
    }

    public function store(Request $request)
    {
        $users = User::find($request->id);
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $extension = $foto->getClientOriginalName();
            $fotoName = date('YmdHis') . "." . $extension;
            $foto->move(storage_path('app/public/profile/foto/'), $fotoName);
            $users->foto = $fotoName;
        }
        $users->email = $request->email;
        $users->name = $request->name;
        $users->nip = $request->nip;

        $users->save();

        return redirect()->route('dashboard.guru');
    }
}
