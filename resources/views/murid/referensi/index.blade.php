@extends('layouts.siswaLayout')

@section('content')
<div class="flex justify-between items-center pb-6 mb-6 border-b-2 border-b-abu-400">
    <x-title title="Referensi Desain" />
    <x-siswa.search-bar :route="route('referensi.index')" />
</div>

{{-- Masonry Gallery --}}
<div class="columns-4 gap-6">
    @foreach ($referensis as $referensi)
    <x-siswa.referensi.image-card :nama="$referensi->nama" :sumber="$referensi->sumber" :id="$referensi->id" :gambar="$referensi->gambar" />
    @endforeach
</div>
@endsection