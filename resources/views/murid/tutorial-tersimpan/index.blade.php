@extends('layouts.siswaLayout')

@section('content')
<div class="flex justify-between items-center pb-6 mb-6 border-b-2 border-b-abu-400">
    <x-subtitle main="Kamus Tutorial" sub="Tersimpan" />
</div>

<div class="grid grid-cols-3 gap-6">
    @foreach ($tutorialTersimpans as $tutorialTersimpan)

        {{-- @php
            $status = $tutorial->status_tersimpan->where('user_id', auth()->user()->id)->first();
        @endphp --}}

    <x-siswa.tutorial.tutorial-card :id="$tutorialTersimpan->tutorial->id" :nama="$tutorialTersimpan->tutorial->nama" :sumber="$tutorialTersimpan->tutorial->sumber" :cover="$tutorialTersimpan->tutorial->cover" :status="$tutorialTersimpan->is_saved" :idstatus="$tutorialTersimpan->id" />
    @endforeach
</div>
@endsection