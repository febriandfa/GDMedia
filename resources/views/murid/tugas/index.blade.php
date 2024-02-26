@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6">
    <x-title title="Tugas" />
</div>

{{-- Jika Belum Join Kelompok --}}
<div class="w-full flex items-center justify-between p-6 rounded-xl border border-red-500">
    <div class="flex items-center gap-4">
        <div class="rounded-full size-7 bg-red-500 flex items-center justify-between">
            <p class="block w-full text-center font-bold text-xl">!</p>
        </div>
        <p class="text-lg font-semibold">Kamu belum bergabung dalam sebuah kelompok!</p>
    </div>
    <a href="{{ route('gabung-kelompok') }}" class="flex w-fit items-center gap-1 bg-hijau rounded-xl text-white px-8 py-3">
        Gabung
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path d="M10 17.5L15 12.5L10 7.5" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </a>
</div>

{{-- Jika Sudah Join Kelompok --}}
{{-- <div class="flex items-center justify-between">
    <div class="">
        <h3 class="mb-2 text-xl font-semibold">Kelompok 1 :</h3>
        <ol class="list-decimal pl-8">
            <li>Nama 1</li>
            <li>Nama 2</li>
            <li>Nama 3</li>
            <li>Nama 4</li>
        </ol>
    </div>
    <div class="flex -space-x-4 rtl:space-x-reverse">
        <img class="size-16 border-2 border-white rounded-full dark:border-gray-800" src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
        <img class="size-16 border-2 border-white rounded-full dark:border-gray-800" src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
        <img class="size-16 border-2 border-white rounded-full dark:border-gray-800" src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
        <img class="size-16 border-2 border-white rounded-full dark:border-gray-800" src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
    </div>
</div> --}}

<div class="h-0.5 w-full bg-abu-400 my-8"></div>

<div class="grid grid-cols-2 gap-10">
    @foreach ($tugases as $tugas)
        <x-siswa.tugas.list-tugas-card :id="$tugas->id" :nama="$tugas->nama" :deadline="$tugas->deadline" />
    @endforeach
</div>

<script>
    console.log(@json($tugases))
</script>
@endsection