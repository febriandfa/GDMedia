@extends('layouts.guruLayout')

@section('content')
<div class="mb-6">
    <x-subtitle main="Materi" sub="Elemen & Kegiatan Pembelajaran" />
</div>

{{-- Content Materi --}}
<h1 class="text-xl font-semibold">{{ $materis->nama }}</h1>
<div class="my-8 p-8 rounded-xl bg-white border-b border-hijau">
    <div class="border border-abu-500 rounded-xl p-7 mb-9">
        <h3 class="font-semibold text-lg mb-3">Deskripsi</h3>
        <p>{{ $materis->deskripsi }}</p>
    </div>
    <div class="border border-abu-500 rounded-xl p-7">
        <h3 class="font-semibold text-lg mb-3">Capaian</h3>
        <p>{{ $materis->capaian }}</p>
    </div>
</div>

{{-- Tambah Submateri --}}

<div class="p-8 rounded-xl bg-white border-b border-hijau">

</div>
@endsection