@extends('layouts.siswaLayout')

@section('content')
<div class="flex justify-between items-center pb-6 mb-6 border-b-2 border-b-abu-400">
    <x-title title="Referensi" />
    <x-siswa.search-bar />
</div>

{{-- Masonry Gallery --}}
<div class="columns-4 gap-6">
    @foreach ($referensis as $referensi)
    <div class="h-auto max-w-60 mb-6">
        <img src="{{ asset('storage/Referensi/gambar/' . $referensi->gambar) }}" alt="Referensi Image {{ $referensi->id }}" class="rounded-xl">
    </div>
    @endforeach
</div>
@endsection