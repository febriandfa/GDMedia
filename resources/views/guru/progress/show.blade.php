@extends('layouts.guruLayout')

@section('content')

@php
    $tugas = $tugases->where('id', $answers[0]->subtugas->tugas_id)->first();
@endphp

<div class="mb-6 flex flex-col gap-6">
    <x-subtitle main="Tugas" :mainLink="route('progress-guru.indexMurid', $tugas->id)" sub="{{ $tugas->nama }}" />
    <p class="text-lg font-semibold">{{ $tugas->deskripsi }}</p>
    <p class="text-lg font-semibold text-red-500">Deadline : {{ $tugas->deadline }}</p>
</div>

<div class="space-y-6">
    @php
        $tugasId = $tugas->id;

        $answerFilter = $answers->filter(function ($answer) use ($tugasId) {
            return $answer->subtugas->tugas->id == $tugasId;
        });

        // $answerFilter = $answers->where('')
    @endphp

    @foreach ($answerFilter as $answer)   
        <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
            <p class="text-xl font-semibold">{{ $answer->subtugas->tahap }}</p>
            <a href="{{ route('progress-guru.edit', $answer->id) }}" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Lihat Hasil Siswa</a>
        </div>
    @endforeach
</div>

@php
    $tugasNilai = $tugas->tugas_nilai->where('murid_id', $answers[0]->user_id)->first();
@endphp

@if ($tugasNilai)
    <div class="w-full rounded-xl border-b border-b-hijau py-4 px-8 bg-hijau-200 mt-16">
        <p class="text-xl font-semibold text-center">Nilai : {{ $tugasNilai->nilai }}</p>
    </div>
@else    
    <div class="w-full">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="p-4 rounded-xl bg-hijau text-lg text-white font-semibold mt-16 block w-fit mx-auto">Tambahkan Nilai</button>
    </div>
@endif

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold">
                    Tambahkan Nilai
                </h3>
                <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="{{ route('progress-guru.store') }}">
            @csrf
                <div class="p-4 md:p-5 space-y-9">
                    <div class="flex flex-col gap-8">
                        <input type="text" id="murid_id" name="murid_id" value="{{ $answers[0]->user_id }}" class="hidden">
                        <input type="text" id="tugas_id" name="tugas_id" value="{{ $tugas->id }}" class="hidden">
                        <input type="number" id="nilai" name="nilai" value="{{ old('nilai') }}" placeholder="Masukkan Nilai" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                    <button data-modal-hide="default-modal" type="submit" class="text-white bg-hijau hover:bg-hijau-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>



{{-- <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>  

<div class="mb-6 flex flex-col gap-6">
    <x-subtitle main="Tugas" :sub="$tugases->nama" />
    <p class="text-lg font-semibold">{{ $tugases->deskripsi }}</p>
    <p class="text-lg font-semibold text-red-500">Deadline : {{ $tugases->deadline }}</p>
</div>

@foreach ($tugases->subtugas[0]->tugas_answer as $tugas_answer)

    @php
        $userFilter = $users->where('id', $tugas_answer->user_id);
    @endphp

    @foreach ($userFilter as $user)
        <div class="bg-white rounded-xl border-b border-b-hijau p-6 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <img class="size-16 rounded-full" src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
                <p class="text-lg font-semibold">{{ $user->name }}</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex items-center justify-center w-fit" x-data="{ circumference: 2 * 22 / 7 * 23 }">
                    <svg class="w-16 h-16 transform -rotate-90">
                        <circle cx="32.5" cy="32.5" r="23" stroke="currentColor" stroke-width="8" fill="transparent" class="text-abu-400" />
                        <circle cx="32.5" cy="32.5" r="23" stroke="currentColor" stroke-width="8" fill="transparent" :stroke-dasharray="circumference" :stroke-dashoffset="circumference - 75 / 100 * circumference" class="text-hijau" />
                    </svg>
                    <span class="absolute text-xs">75%</span>
                </div>
                <a href="" class="py-2 px-8 rounded-xl bg-hijau text-white">
                    Lihat
                </a>
            </div>
        </div>
    @endforeach

@endforeach
 --}}

<script>
    console.log(@json($tugases))
    console.log(@json($answers))
</script>
@endsection