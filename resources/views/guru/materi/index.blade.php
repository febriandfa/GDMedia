@extends('layouts.guruLayout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <x-title title="Materi" />
    <button class="text-[1.75rem] text-white size-14 rounded-full bg-hijau-400">+</button>
</div>

@foreach ($materis as $materi)
<div class="mb-4">
    <x-guru.materi.list-materi-card :title="$materi->nama" :mapel="$materi->mata_pelajaran" :id="$materi->id" />
</div>
@endforeach

@if (count($materis) == 0)
<div class="flex items-center justify-center" style="height: calc(100vh - 20vh)">
    <x-no-data text="Belum Ada Materi" />
</div>
@endif
@endsection