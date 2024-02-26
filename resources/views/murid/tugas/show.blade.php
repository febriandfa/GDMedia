@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6 flex flex-col gap-6">
    <x-subtitle main="Tugas" sub="{{ $tugases->nama }}" />
    <p class="text-lg font-semibold">{{ $tugases->deskripsi }}</p>
    <p class="text-lg font-semibold text-red-500">Deadline : {{ $tugases->deadline }}</p>
</div>

<div class="space-y-6">
    @foreach ($tugases->subtugas as $subtugas)    
        <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
            <p class="text-xl font-semibold">{{ $subtugas->tahap }}</p>
            <a href="{{ route('subtugas.show', $subtugas->id) }}" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Kerjakan</a>
        </div>
    @endforeach

    {{-- <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
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
    </div> --}}
</div>

<script>
    console.log(@json($tugases))
</script>
@endsection