@extends('layouts.guruLayout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <x-title title="Materi" />
    <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="text-[1.75rem] text-white size-14 rounded-full bg-hijau-400">+</button>
</div>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold">
                    Tambahkan Elemen Pembelajaran
                </h3>
                <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="PATCH" action="{{ route('materi-guru.update', $materis->id) }}">
            @csrf
                <div class="p-4 md:p-5 space-y-9">
                    <div class="flex flex-col gap-8">
                        <input type="text" id="id" name="id" value="{{ $materis->id }}">
                        <input type="text" id="nama" name="nama" value="{{ $materis->nama }}" placeholder="Masukkan Nama Elemen" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        <input type="text" id="mata_pelajaran" name="mata_pelajaran" value="{{ $materis->mata_pelajaran }}" placeholder="Masukkan Mata Pelajaran" required class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        <textarea name="deskripsi" id="deskripsi" rows="6" value="{{ $materis->deskripsi }}" placeholder="Masukkan Deskripsi" class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2"></textarea>
                        <textarea name="capaian" id="capaian" rows="6" value="{{ $materis->capaian }}" placeholder="Masukkan Capaian" class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2"></textarea>
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

<h1>{{ $materis->nama }}</h1>
<h1>{{ $materis->id }}</h1>

{{-- @foreach ($materis as $materi)
<div class="mb-4">
    <x-guru.materi.list-materi-card :title="$materi->nama" :mapel="$materi->mata_pelajaran" :id="$materi->id" />
</div>
@endforeach --}}

{{-- @if (count($materis) == 0)
<div class="flex items-center justify-center" style="height: calc(100vh - 20vh)">
    <x-no-data text="Belum Ada Materi" />
</div>
@endif --}}
@endsection