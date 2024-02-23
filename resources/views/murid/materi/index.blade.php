@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6">
    <x-title title="Materi" />
</div>

@foreach ($materis as $materi)
<div class="mb-4">
    <x-siswa.materi.list-materi-card :title="$materi->nama" :mapel="$materi->mata_pelajaran" :id="$materi->id" />
</div>
@endforeach
@endsection