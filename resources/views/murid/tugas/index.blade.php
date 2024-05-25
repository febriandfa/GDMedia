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
            <div>
                <h3 class="text-xl font-semibold mb-2">{{ $kelompok->name }}</h3>
                <p class="text-lg font-semibold mb-2">Anggota Kelompok :</p>
                <ol class="pl-8 list-decimal *:font-semibold">
                    @foreach ($anggotas as $anggota)
                        <li>{{ $anggota }}</li>
                    @endforeach
                </ol>
            </div>

            <div class="flex -space-x-4 rtl:space-x-reverse">
                @foreach ($kelompokAnggotas as $kelompokAnggota)
                    @if ($loop->index < 4)
                        <img class="size-16 border-2 border-white rounded-full dark:border-gray-800"
                            src="{{ auth()->user()->foto ? asset('storage/profile/foto/' . auth()->user()->foto) : asset('assets/profil-icon.jpg') }}"
                            alt="Icon User">
                    @else
                        @break
                    @endif
                @endforeach
            </div>

        </div>
    @endif
    <div class="h-0.5 w-full bg-abu-400 my-8"></div>

    <div class="grid grid-cols-2 gap-10">
        @foreach ($tugases as $tugas)
            @php
                $subtugasFilter = $subtugases->where('tugas_id', $tugas->id);
                $subtugasLength = $subtugasFilter->count();

                $tugasId = $tugas->id;
                $userId = auth()->user()->id;

                $answerFilter = $answers->filter(function ($answer) use ($tugasId, $userId) {
                    return $answer->subtugas->tugas->id == $tugasId && $answer->user_id == $userId;
                });

                $answerLength = $answerFilter->count();

                if ($subtugasLength == 0) {
                    $answerPercentage = 0;
                } else {
                    $answerPercentage = ($answerLength / $subtugasLength) * 100;
                }
            @endphp

            @php
                $nilaiUser = $tugas->tugas_nilai->where('murid_id', auth()->user()->id)->first();
            @endphp

            <x-siswa.tugas.list-tugas-card :id="$tugas->id" :nama="$tugas->nama" :deadline="$tugas->deadline" :nilai="$nilaiUser ? $nilaiUser->nilai : 'Belum Dinilai'"
                :percentage="round($answerPercentage, 2) ? round($answerPercentage, 1) : 0" :kelompok="auth()->user()->kelompok_id ? auth()->user()->kelompok_id : 'N'" />
        @endforeach
    </div>
@endsection
