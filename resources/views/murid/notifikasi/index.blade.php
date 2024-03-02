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
        <div class="p-4 rounded-xl bg-hijau-200">
            <p>
                {{ $notifikasi->pesan }}
            </p>
            <p class="text-xs mt-4">{{ \Carbon\Carbon::parse($notifikasi->created_at)->format('d M, H.i') }} WIB
            </p>
        </div>
    @endforeach
</div>
@endsection