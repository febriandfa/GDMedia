@extends('layouts.siswaLayout')

@section('content')
    <div class="mb-6">
        <x-title title="Tugas" />
    </div>

    @if (Auth::user()->kelompok_id == null)
        {{-- Jika Belum Join Kelompok --}}

        <div class="w-full flex items-center justify-between p-6 rounded-xl border border-red-500">
            <div class="flex items-center gap-4">
                <div class="rounded-full size-7 bg-red-500 flex items-center justify-between">
                    <p class="block w-full text-center font-bold text-xl">!</p>
                </div>
                <p class="text-lg font-semibold">Kamu belum bergabung dalam sebuah kelompok!</p>
            </div>
            <a href="{{ route('gabung-kelompok') }}"
                class="flex w-fit items-center gap-1 bg-hijau rounded-xl text-white px-8 py-3">
                Gabung
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <path d="M10 17.5L15 12.5L10 7.5" stroke="currentcolor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </a>
        </div>
    @else
        {{-- Jika Sudah Join Kelompok --}}
        <div class="flex items-center justify-between">
            @foreach ($kelompoks as $kelompok)
                <div class="">
                    <h3 class="mb-2 text-xl font-semibold">Kamu sudah tergabung ke Kelompok {{ $kelompok->kelompok->name }},
                        <br>Silahkan
                        Lihat kelompok Untuk Melihat Tugas Kelompok
                    </h3>
                    <a href="/murid/kelompok/{{ $kelompok->kelompok->id }}"
                        class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Lihat
                        Kelompok</a>
                </div>
                <div class="flex -space-x-4 rtl:space-x-reverse">
                    <img class="size-16 border-2 border-white rounded-full dark:border-gray-800"
                        src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
                    <img class="size-16 border-2 border-white rounded-full dark:border-gray-800"
                        src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
                    <img class="size-16 border-2 border-white rounded-full dark:border-gray-800"
                        src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
                    <img class="size-16 border-2 border-white rounded-full dark:border-gray-800"
                        src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
                </div>
            @endforeach
        </div>
    @endif
    <div class="h-0.5 w-full bg-abu-400 my-8"></div>

    {{-- <div class="grid grid-cols-2 gap-10">
        @foreach ($tugases as $tugas)
            @php
                $nilaiUser = $tugas->tugas_nilai->where('murid_id', auth()->user()->id)->first();
            @endphp

            <x-siswa.tugas.list-tugas-card :id="$tugas->id" :nama="$tugas->nama" :deadline="$tugas->deadline" :nilai="$nilaiUser ? $nilaiUser->nilai : 'Belum Dinilai'" />
        @endforeach
    </div> --}}

    <script>
        console.log(@json($tugases))
    </script>
@endsection
