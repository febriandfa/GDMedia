@extends('layouts.guruLayout')

@section('content')
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    <div class="mb-6 flex flex-col gap-6">
        <x-subtitle main="Tugas" :mainLink="route('progress-guru.index')" :sub="$tugases->nama" />
        <p class="text-lg font-semibold">{{ $tugases->deskripsi }}</p>
        <p class="text-lg font-semibold text-red-500">Deadline : {{ $tugases->deadline }}</p>
    </div>

    <a href="{{ route('progress-guru.exportPdf', $tugases->id) }}" class="block w-fit ml-auto text-hijau underline mb-6">
        Unduh Rekapan Nilai Siswa
    </a>

    <div class="space-y-6">

        @foreach ($tugases->subtugas[0]->tugas_answer as $tugas_answer)
            @php
                $userFilter = $users->where('id', $tugas_answer->user_id);
                $sortedUsers = $userFilter->sortBy(function ($user) {
                    return $user->name;
                });
            @endphp

            @foreach ($sortedUsers as $user)
                @php
                    // $answerFilter = $answers->where('user_id', $user->id);

                    $userId = $user->id;
                    $tugasId = $tugases->id;

                    $answerFilter = $answers->filter(function ($answer) use ($tugasId, $userId) {
                        return $answer->subtugas->tugas->id == $tugasId && $answer->user_id == $userId;
                    });

                    $subtugasLength = $subtugases->count();

                    $answerLength = $answerFilter->count();

                    $answerPercentage = ($answerLength / $subtugasLength) * 100;

                    $userGrade = $tugases->tugas_nilai->where('murid_id', $userId)->first();
                @endphp

                <div class="bg-white rounded-xl border-b border-b-hijau p-6 flex items-center justify-between">
                    <div class="flex items-center gap-4">
                        @if ($user->foto)
                            <img class="size-16 rounded-full" src="{{ asset('storage/profile/foto/' . $user->foto) }}"
                                alt="Icon User">
                        @else
                            <img class="size-16 rounded-full" src="{{ asset('assets/profile-icon.png') }}" alt="Icon User">
                        @endif
                        <p class="text-lg font-semibold">{{ $user->name }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex items-center justify-center w-fit" x-data="{ circumference: 2 * 22 / 7 * 23 }">
                            <svg class="w-16 h-16 transform -rotate-90">
                                <circle cx="32.5" cy="32.5" r="23" stroke="currentColor" stroke-width="8"
                                    fill="transparent" class="text-abu-400" />
                                <circle cx="32.5" cy="32.5" r="23" stroke="currentColor" stroke-width="8"
                                    fill="transparent" :stroke-dasharray="circumference"
                                    :stroke-dashoffset="circumference - {{ $answerPercentage }} / 100 * circumference"
                                    class="text-hijau" />
                            </svg>
                            <span
                                class="absolute text-xs">{{ round($answerPercentage, 2) ? round($answerPercentage, 1) : 0 }}%</span>
                        </div>
                        @if ($userGrade)
                            <div
                                class="py-1.5 px-8 rounded-xl bg-white border-2 border-hijau text-lg text-hijau font-semibold block w-fit">
                                Nilai : {{ $userGrade->nilai }}</div>
                        @endif
                        <a href="{{ route('progress-guru.show', $user->id) }}"
                            class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">
                            Lihat
                        </a>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

    <script>
        console.log(@json($tugases))
        console.log(@json($answerFilter))
    </script>
@endsection
