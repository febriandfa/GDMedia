@extends('layouts.siswaLayout')

@section('content')
    <div class="card mb-6 flex flex-col gap-6">
        <x-subtitle main="Tugas" :mainLink="route('tugas.index')" sub="subtugas" />

        <div class="grid grid-cols-4 gap-10">
            <h4>Selamat datang di kelompok {{ Auth::user()->kelompok->name }}</h4>
        </div>

        <div class="grid grid-cols-4 gap-10">
            <h3>List Anggota Kelompok :
            </h3>
            @foreach ($anggota as $list)
                <ol>
                    <li>{{ $list }}</li>
                </ol>
            @endforeach
        </div>

        <div class="grid grid-cols-2 gap-10">
            @foreach ($tugases as $tugas)
                @php
                    $nilaiUser = $tugas->tugas_nilai->where('murid_id', auth()->user()->id)->first();
                @endphp

                <x-siswa.tugas.list-tugas-card :id="$tugas->id" :nama="$tugas->nama" :deadline="$tugas->deadline" :nilai="$nilaiUser ? $nilaiUser->nilai : 'Belum Dinilai'" />
            @endforeach
        </div>
    </div>

    {{-- <div class="space-y-6">

        <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
            <p class="text-xl font-semibold">tHAPAN</p>
            <a href="" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">TAHPAN</a>
        </div>
        <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
            <p class="text-xl font-semibold">Tugas 2 : Penentuan Tema</p>
            <a href="" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Kerjakan</a>
        </div>
        <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
            <p class="text-xl font-semibold">Tugas 3 : Penentuan Tema</p>
            <a href="" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Kerjakan</a>
        </div>
        <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
            <p class="text-xl font-semibold">Tugas 4 : Penentuan Tema</p>
            <a href="" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Kerjakan</a>
        </div>
    </div> --}}
@endsection
