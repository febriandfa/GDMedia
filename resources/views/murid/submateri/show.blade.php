@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6">
    <x-itemtitle main="Materi" :sub="$submateris->materi->nama" :item="$submateris->nama" />
</div>

@php
    $status = $submateris->status_murid->where('user_id', auth()->user()->id)->first();

    $userStatus = $status ? $status->is_seen : "N";
@endphp

<div class="mb-2 flex justify-between items-center">
    <x-title :title="$submateris->nama" />
    <form method="POST" action="{{ route('user-submateri.store') }}">
    @csrf
        <input type="text" name="submateri_id" id="submateri_id" value="{{ $submateris->id }}" class="hidden">
        <button type="submit" {{ $userStatus == "Y" ? 'disabled' : '' }} class="text-lg font-semibold px-4 py-2 rounded-xl {{ $userStatus == "Y" ? "bg-white border border-hijau text-hijau" : "bg-hijau border-none text-white" }}">{{ $userStatus == "Y" ? "Sudah Dipelajari" : "Selesai Pelajari" }}</button>
    </form>
</div>

<embed class="block rounded-xl w-full h-screen bg-[#D9D9D9] my-6" src="{{ asset('storage/Submateri/file/' . $submateris->file) }}" type="application/pdf">
</embed>

<h3 class="font-semibold text-xl blocl w-full border-b-2 pb-2 mb-4 border-b-abu-400"><span class="w-fit border-b-2 border-b-hijau pb-2">Deskripsi</span></h3>
<p class="text-justify">{{ $submateris->deskripsi }}</p>
@endsection