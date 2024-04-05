@extends('layouts.guruLayout')

@section('content')
    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    @php
        $tugas = $tugases->where('id', $answers->subtugas->tugas_id)->first();

        $subtugasLength = $tugas->subtugas->count();

        $tugasId = $tugas->id;
        $userId = $answers->user_id;

        $answerFilter = $answerAlls->filter(function ($answer) use ($tugasId, $userId) {
            return $answer->subtugas->tugas->id == $tugasId && $answer->user_id == $userId;
        });

        $answerLength = $answerFilter->count();

        $answerPercentage = ($answerLength / $subtugasLength) * 100;
    @endphp

    <div class="mb-6 flex flex-col gap-6">
        <x-itemtitle main="Progress" :mainLink="route('progress-guru.index')" :sub="$tugas->nama" :subLink="route('progress-guru.indexMurid', $tugas->id)" :item="$answers->subtugas->tahap" />
        <x-title :title="$answers->subtugas->tahap" />
        <p class="text-lg font-semibold text-red-500">Deadline : {{ $tugas->deadline }}</p>
    </div>

    <div class="bg-white rounded-xl border-b border-b-hijau p-6 flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <img class="size-16 rounded-full" src="{{ asset('assets/profil-icon.jpg') }}" alt="Icon User">
            <p class="text-lg font-semibold">{{ $answers->user->name }}</p>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center justify-center w-fit" x-data="{ circumference: 2 * 22 / 7 * 23 }">
                <svg class="w-16 h-16 transform -rotate-90">
                    <circle cx="32.5" cy="32.5" r="23" stroke="currentColor" stroke-width="8" fill="transparent"
                        class="text-abu-400" />
                    <circle cx="32.5" cy="32.5" r="23" stroke="currentColor" stroke-width="8" fill="transparent"
                        :stroke-dasharray="circumference"
                        :stroke-dashoffset="circumference - {{ $answerPercentage }} / 100 * circumference"
                        class="text-hijau" />
                </svg>
                <span class="absolute text-xs">{{ round($answerPercentage, 1) }}%</span>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="border border-abu-400 rounded-xl p-5">
            <p class="font-semibold mb-3">File</p>
            @if ($answers->file)
                <embed class="block rounded-xl w-full h-screen bg-[#D9D9D9] my-6"
                    src="{{ asset('storage/TugasAnswer/file/' . $answers->file) }}" type="application/pdf">
                </embed>
            @else
                <p class="text-sm">Tidak Ada File</p>
            @endif
        </div>
        <div class="border border-abu-400 rounded-xl p-5">
            <p class="font-semibold mb-3">Catatan</p>
            <p class="text-sm">{{ $answers->catatan ? $answers->catatan : 'Tidak Ada Catatan' }}</p>
        </div>
        <div class="border border-abu-400 rounded-xl p-5">
            <p class="font-semibold mb-3">Link</p>
            <p class="text-sm">{{ $answers->link ? $answers->link : 'Tidak Ada Link' }}</p>
        </div>
    </div>

    <div class="w-full">
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
            class="p-4 rounded-xl bg-hijau text-lg text-white font-semibold mt-16 block w-fit mx-auto">Feedback</button>
    </div>

    <!-- Main modal -->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                    <h3 class="text-xl font-semibold">
                        Tambahkan Feedback
                    </h3>
                    <button type="button"
                        class="bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                        data-modal-hide="default-modal">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="POST" action="{{ route('progress-guru.update', $answers->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="p-4 md:p-5 space-y-9">
                        <div class="flex flex-col gap-8">
                            <textarea name="feedback" id="feedback" rows="6" value="{{ $answers->feedback }}" placeholder="Masukkan Feedback"
                                class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">{{ $answers->feedback }}</textarea>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
                        <button data-modal-hide="default-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                        <button data-modal-hide="default-modal" type="submit"
                            class="text-white bg-hijau hover:bg-hijau-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        console.log(@json($answers))
    </script>
@endsection
