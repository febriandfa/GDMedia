@extends('layouts.guruLayout')

@section('content')
<div class="mb-6 flex flex-col gap-6">
    <x-subtitle main="Tugas" sub="Proyek 1" />
    <p class="text-lg font-semibold">Buatlah sebuah poster secara berkelompok!, kerjakan bertahap sesuai pembagian tahapan yang tertera!</p>
    <p class="text-lg font-semibold text-red-500">Deadline : 30/03/2027</p>
</div>

<div id="add-submateri" class="flex justify-between items-center">
    <div class="flex items-center gap-4">
        <div class="rounded-full size-7 bg-red-500 flex items-center justify-between">
            <p class="block w-full text-center font-bold text-xl">!</p>
        </div>
        <p class="text-xl font-semibold">Belum ada isi rincian tahapan tugas</p>
    </div>
    <button type="button" onclick="showSectionSubmateri()" class="text-hijau underline">+ Tambahkan</button>
</div>

<div id="section-submateri" class="hidden my-6 p-8 rounded-xl bg-white border-b border-hijau">
    <h3 class="text-xl font-semibold">
        Tambahkan Rincian Tahapan Tugas
    </h3>
    <form method="POST" action="">
    @csrf
        <div class="p-4 md:p-5 space-y-9">
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Tahap" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
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