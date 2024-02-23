@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6">
    <x-subtitle main="Materi" :sub="$submateris[0]->materi->nama" />
</div>

@foreach ($submateris as $submateri)
<div class="mb-4">
    <x-siswa.submateri.list-submateri-card :index="$submateri->id" :title="$submateri->nama" :desc="$submateri->deskripsi" :id="$submateri->id" />
</div>
@endforeach
@endsection