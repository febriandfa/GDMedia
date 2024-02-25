@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6">
    <x-title title="Materi" />
</div>

@foreach ($materis as $materi)

    {{-- @foreach ($materi->submateri as $submateri)
        @php
            $isSeen = $submateri->status_murid->where('user_id', auth()->user()->id)->where('is_seen', 'Y');
            $isSeenLength = $isSeen->count()
        @endphp
    @endforeach --}}

    @php
        $totalSubmateri = $materi->submateri->count();

        $isSeen = $materi->submateri
            ->flatMap(fn ($submateri) => $submateri->status_murid)
            ->where('user_id', auth()->user()->id)
            ->where('is_seen', 'Y');

        $isSeenLength = $isSeen->count();
        
        $percentage = $totalSubmateri > 0 ? ($isSeenLength / $totalSubmateri) * 100 : 0;
    @endphp

<div class="mb-4">
    <x-siswa.materi.list-materi-card :title="$materi->nama" :mapel="$materi->mata_pelajaran" :id="$materi->id" :percentage="$percentage" />
</div>
@endforeach

<script>
    console.log(@json($materis))
    console.log(@json($isSeen))
</script>
@endsection