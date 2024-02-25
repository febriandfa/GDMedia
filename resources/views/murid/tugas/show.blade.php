@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6 flex flex-col gap-6">
    <x-subtitle main="Tugas" sub="Proyek 1" />
    <p class="text-lg font-semibold">Buatlah sebuah poster secara berkelompok!, kerjakan bertahap sesuai pembagian tahapan yang tertera!</p>
    <p class="text-lg font-semibold text-red-500">Deadline : 30/03/2027</p>
</div>


<div class="space-y-6">
    <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
        <p class="text-xl font-semibold">Tugas 1 : Penentuan Tema</p>
        <a href="{{ route('tahap1') }}" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Kerjakan</a>
    </div>
    <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
        <p class="text-xl font-semibold">Tugas 2 : Penentuan Tema</p>
        <a href="{{ route('tahap2') }}" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Kerjakan</a>
    </div>
    <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
        <p class="text-xl font-semibold">Tugas 3 : Penentuan Tema</p>
        <a href="{{ route('tahap3') }}" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Kerjakan</a>
    </div>
    <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
        <p class="text-xl font-semibold">Tugas 4 : Penentuan Tema</p>
        <a href="{{ route('tahap4') }}" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Kerjakan</a>
    </div>
</div>
@endsection