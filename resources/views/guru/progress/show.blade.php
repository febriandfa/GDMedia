@extends('layouts.guruLayout')

@section('content')

@php
    $tugas = $tugases->where('id', $answers[0]->subtugas->tugas_id)->first();
@endphp

<div class="mb-6 flex flex-col gap-6">
    <x-subtitle main="Tugas" sub="{{ $tugas->nama }}" />
    <p class="text-lg font-semibold">{{ $tugas->deskripsi }}</p>
    <p class="text-lg font-semibold text-red-500">Deadline : {{ $tugas->deadline }}</p>
</div>

<div class="space-y-6">
    @foreach ($answers as $answer)   
        <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
            <p class="text-xl font-semibold">{{ $answer->subtugas->tahap }}</p>
            <a href="{{ route('progress-guru.edit', $answer->id) }}" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Lihat Hasil Siswa</a>
        </div>
    @endforeach
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