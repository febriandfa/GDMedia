@extends('layouts.siswaLayout')

@section('content')
<div class="flex justify-between items-center pb-6 mb-6 border-b-2 border-b-abu-400">
    <x-title title="Kamus Tutorial" />
    <x-siswa.search-bar />
</div>

<div class="grid grid-cols-3 gap-6">
    @foreach ($tutorials as $tutorial)
    <x-siswa.tutorial.tutorial-card :id="$tutorial->id" :nama="$tutorial->nama" :sumber="$tutorial->sumber" :cover="$tutorial->cover" />
    @endforeach
</div>
@endsection