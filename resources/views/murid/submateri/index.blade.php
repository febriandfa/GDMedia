@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6">
    <x-subtitle main="Materi" :mainLink="route('materi.index')" :sub="$submateris[0]->materi->nama" />
</div>

@foreach ($submateris as $index => $submateri)

    @php
        $status = $submateri->status_murid->where('user_id', auth()->user()->id)->first();
    @endphp

<div class="mb-4">
    <x-siswa.submateri.list-submateri-card :index="$index + 1" :title="$submateri->nama" :desc="$submateri->deskripsi" :id="$submateri->id" :status="$status ? $status->is_seen : 'N'" />
</div>
@endforeach

<script>
    console.log(@json($submateris))
</script>
@endsection