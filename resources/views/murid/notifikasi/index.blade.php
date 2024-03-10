@extends('layouts.siswaLayout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <x-title title="Notifikasi" />
    <div class="flex items-center gap-2">
        <x-siswa.profil.profil-icon />
        <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
    </div>
</div>

<div class="space-y-6">
    @foreach ($notifikasis as $notifikasi)

        @php
            $notifikasiId = $notifikasi->id;
            $userId = auth()->user()->id;

            $notifikasiFilter = $notifikasi->notifikasi_seens->filter(function ($notifikasi) use ($notifikasiId, $userId) {
                return $notifikasi->notifikasi_id == $notifikasiId && $notifikasi->user_id == $userId;
            });
        @endphp

    <form method="POST" action="{{ route('notifikasi.markSeen') }}">
    @csrf
        <input type="text" id="notifikasi_id" name="notifikasi_id" value="{{ $notifikasi->id }}" class="hidden">
        <button type="submit" {{ count($notifikasiFilter) != 0 ? 'disabled' : '' }} class="p-4 rounded-xl {{ count($notifikasiFilter) == 0 ? 'bg-hijau-200' : 'bg-hijau-100' }} w-full text-left flex justify-between items-center">
            <div>
                <p>
                    {{ $notifikasi->pesan }}
                </p>
                <p class="text-xs mt-4">{{ \Carbon\Carbon::parse($notifikasi->created_at)->format('d M, H.i') }} WIB
                </p>
            </div>
            @if(count($notifikasiFilter) == 0) 
            <div class="rounded-full size-4 bg-hijau"></div>
            @endif
        </button>
    </form>
    @endforeach
</div>

<script>
    console.log(@json($notifikasiFilter))
    console.log(@json($notifikasis))
</script>
@endsection