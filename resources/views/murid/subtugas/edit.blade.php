@extends('layouts.siswaLayout')

@section('content')

@php
    $userAnswer = $subtugases->tugas_answer->where('user_id', auth()->user()->id)->first();
@endphp

<div class="mb-6 flex flex-col gap-6">
    <x-itemtitle main="Tugas" :sub="$subtugases->tugas->nama" :item="$subtugases->tahap" />
    <x-title :title="$subtugases->tahap" />
    <p class="text-lg font-semibold text-red-500">Deadline : {{ $subtugases->tugas->deadline }}</p>
</div>

<div class="rounded-xl bg-white p-8 border-b border-b-hijau space-y-6 mb-8">
    <p>{{ $subtugases->deskripsi }}</p>
    <div class="border border-abu-400 rounded-xl p-5">
        <p class="font-semibold mb-3">Catatan</p>
        <p class="text-sm">{{ $userAnswer->catatan ? $userAnswer->catatan : "Tidak Ada Catatan" }}</p>
    </div>
    <div class="border border-abu-400 rounded-xl p-5">
        <p class="font-semibold mb-3">Link</p>
        <p class="text-sm">{{ $userAnswer->link ? $userAnswer->link : "Tidak Ada Link" }}</p>
    </div>
    <div class="border border-abu-400 rounded-xl p-5">
        <p class="font-semibold mb-3">File</p>
        @if ($userAnswer->file)
            <embed class="block rounded-xl w-full h-screen bg-[#D9D9D9] my-6" src="{{ asset('storage/TugasAnswer/file/' . $userAnswer->file) }}" type="application/pdf">
            </embed>
        @else
            <p class="text-sm">Tidak Ada File</p>
        @endif
    </div>
</div>

<h3 class="text-xl font-semibold mb-2">Nilai & Masukan Dari Fasilitator</h3>
<div class="rounded-xl bg-white p-8 border-b border-b-hijau">
    <p class="text-sm">ihfiaf auhfhawhf awjfawfuia uawbf uiabf</p>
</div>

<script>
    console.log(@json($subtugases))
    console.log(@json($userAnswer))
</script>
@endsection