@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6">
    <x-title title="Tugas" />
</div>

<div class="grid grid-cols-2 gap-10">
    <x-siswa.tugas.list-tugas-card />
    <x-siswa.tugas.list-tugas-card />
</div>
@endsection