@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6 flex flex-col gap-6">
    <x-subtitle main="Tugas" sub="Pembagian Kelompok" />
    <x-title title="Pembagian Kelompok" />
</div>

<div class="space-y-6">
    <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
        <p class="text-xl font-semibold">Kelompok 1</p>
        <form method="POST" action="">
        @csrf
            <button type="submit" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Gabung</button>
        </form>
    </div>
</div>
@endsection