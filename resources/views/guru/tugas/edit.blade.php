@extends('layouts.guruLayout')

@section('content')
<div class="mb-6 flex flex-col gap-6">
    <x-subtitle main="Tugas" :sub="$tugases->nama" />
    <p class="text-lg font-semibold">{{ $tugases->deskripsi }}</p>
    <p class="text-lg font-semibold text-red-500">Deadline : {{ $tugases->deadline }}</p>
</div>

@if (count($tugases->subtugas) == 0)
    <div id="add-submateri" class="flex justify-between items-center">
        <div class="flex items-center gap-4">
            <div class="rounded-full size-7 bg-red-500 flex items-center justify-between">
                <p class="block w-full text-center font-bold text-xl">!</p>
            </div>
            <p class="text-xl font-semibold">Belum ada isi rincian tahapan tugas</p>
        </div>
        <button type="button" onclick="showSectionSubmateri()" class="text-hijau underline">+ Tambahkan</button>
    </div>
@else
    <div class="w-full h-0.5 bg-hijau"></div>
    <div class="my-8">
        @foreach ($tugases->subtugas as $subtugas)
            <x-guru.subtugas.subtugas-card :id="$subtugas->id" :title="$subtugas->tahap" :desc="$subtugas->deskripsi" />
        @endforeach
        <div class="flex justify-center">
            <button type="button" onclick="showSectionSubmateri()" class="text-[1.75rem] text-white size-14 rounded-full bg-hijau-400">+</button>
        </div>
    </div>
@endif

<div id="section-submateri" class="hidden my-6 p-8 rounded-xl bg-white border-b border-hijau">
    <h3 class="text-xl font-semibold">
        Tambahkan Rincian Tahapan Tugas
    </h3>
    <form method="POST" action="{{ route('subtugas-guru.store') }}">
    @csrf
        <div class="p-4 md:p-5 space-y-9">
            <input type="text" id="tugas_id" name="tugas_id" value="{{ $tugases->id }}" class="hidden" />
            <input type="text" id="tahap" name="tahap" value="{{ old('tahap') }}" placeholder="Masukkan Nama Tahap" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
            <textarea name="deskripsi" id="deskripsi" rows="6" value="{{ old('deskripsi') }}" placeholder="Masukkan Deskripsi" class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2"></textarea>
        </div>
        <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
            <button type="button" onclick="closeSectionSubmateri()" class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
            <button type="submit" class="text-white bg-hijau hover:bg-hijau-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
        </div>
    </form>
</div>

{{-- Function --}}
<script>
    // Handle Show Add Submateri
    function showSectionSubmateri() {
        var sectionSubmateri = document.getElementById('section-submateri');
        // Remove Class
        sectionSubmateri.classList.remove('hidden');
        // Add Class
        sectionSubmateri.classList.add('block');
    }

    // Handle Close Add Submateri
    function closeSectionSubmateri() {
        var sectionSubmateri = document.getElementById('section-submateri');
        // Remove Class
        sectionSubmateri.classList.remove('block');
        // Add Class
        sectionSubmateri.classList.add('hidden');
    }
</script>
@endsection