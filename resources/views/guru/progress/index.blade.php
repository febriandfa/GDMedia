@extends('layouts.guruLayout')

@section('content')
<div class="mb-6">
    <x-title title="Progress Tugas Siswa" />
</div>

@foreach ($tugases as $index => $tugas)
    <a href="{{ route('progress-guru.show', $tugas->id) }}" class="p-6 bg-white rounded-xl block">
        <h1 class="mb-6 text-xl font-semibold">{{ $tugas->nama }}</h1>
        <div class="p-8 border rounded-lg border-hijau flex items-center justify-between">
            <div>
                <h2 class="mb-2">{{ $tugas->nama }}</h2>
                <h2 class="text-red-500">Deadline : {{ $tugas->deadline }}</h2>
            </div>
            <svg class="text-hijau" xmlns="http://www.w3.org/2000/svg" width="13" height="25" viewBox="0 0 13 25" fill="none">
                <path d="M1.18182 24.3299C1.02682 24.3318 0.873143 24.3012 0.730668 24.2402C0.588192 24.1791 0.460072 24.0889 0.354545 23.9754C-0.118182 23.5027 -0.118182 22.7699 0.354545 22.2972L10.1636 12.4881L0.354545 2.70265C-0.118182 2.22992 -0.118182 1.49719 0.354545 1.02447C0.827273 0.55174 1.56 0.55174 2.03273 1.02447L12.6455 11.6845C13.1182 12.1572 13.1182 12.8899 12.6455 13.3626L2.00909 23.9754C1.77273 24.2117 1.46545 24.3299 1.18182 24.3299Z" fill="currentcolor"/>
            </svg>
        </div>
    </a>
@endforeach

<script>
    console.log(@json($progress))
    console.log(@json($tugases))
    console.log(@json($users))
</script>
@endsection