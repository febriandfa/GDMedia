@extends('layouts.siswaLayout')

@section('content')
    @php
        $materiPercentage = 0;
        $answerPercentage = 0;
    @endphp

    @if ($userMateris)
        @php
            // $userFilter =
        @endphp
    @endif

    @if ($userMateris)
        @php
            $submateriFilter = $submateris->where('id', $userMateris->submateri_id)->first();
            $materiFilter = $materis->where('id', $submateriFilter->materi_id)->first();

            $submateriLength = $materiFilter->submateri->count();

            $isSeen = $materiFilter->submateri
                ->flatMap(fn($submateri) => $submateri->status_murid)
                ->where('user_id', auth()->user()->id)
                ->where('is_seen', 'Y');

            $isSeenLength = $isSeen->count();

            $materiPercentage = ($isSeenLength / $submateriLength) * 100;

        @endphp
    @endif

    @if ($answers)
        @php
            $tugasFilter = $tugases->where('id', $answers->subtugas->tugas->id)->first();

            $subtugasLength = $tugasFilter->subtugas->count();

            $tugasId = $tugasFilter->id;
            $userId = auth()->user()->id;

            $answerFilter = $answerAlls->filter(function ($answer) use ($tugasId, $userId) {
                return $answer->subtugas->tugas->id == $tugasId && $answer->user_id == $userId;
            });

            $answerLength = $answerFilter->count();

            $answerPercentage = ($answerLength / $subtugasLength) * 100;
        @endphp
    @endif

    <script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>

    <div class="grid grid-cols-4">
        <div class="col-span-3 border-r-2 border-abu-400 pr-6">
            <x-title title="Dashboard" />

            {{-- Dibawah --}}
            @if ($pengumumans)    
            <div class="w-full bg-abu-300 p-6 rounded-xl space-y-4">
                <div class="flex items-center gap-3">
                    <img src="{{ auth()->user()->foto ? asset('storage/profile/foto/' . auth()->user()->foto) : asset('assets/profil-icon.jpg') }}" alt="Profil Icon" class="size-20 rounded-full">
                    <div>
                        <p class="text-lg font-semibold">{{ $pengumumans->users->name }}</p>
                        <p>{{ \Carbon\Carbon::parse($pengumumans->created_at)->format('d F Y') }}</p>
                    </div>
                </div>
                <p>{{ $pengumumans->pesan }}</p>
            </div>
            @endif
            {{-- Diatas --}}

            <div class="grid grid-cols-2 gap-6 my-6">
                <div class="bg-hijau-100 p-6 rounded-xl h-fit">
                    <h3 class="text-xl font-semibold mb-6">Progress Materi</h3>
                    <div class="rounded-xl border border-hijau p-3 space-y-3">
                        @if ($userMateris)
                            <div>
                                <p>{{ $userMateris->submateri->materi->nama }}</p>
                                <div class="flex items-center gap-6 mt-6">
                                    <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 23 }">
                                        <svg class="w-16 h-16 transform -rotate-90">
                                            <circle cx="32.5" cy="32.5" r="23" stroke="currentColor"
                                                stroke-width="8" fill="transparent" class="text-abu-400" />
                                            <circle cx="32.5" cy="32.5" r="23" stroke="currentColor"
                                                stroke-width="8" fill="transparent" :stroke-dasharray="circumference"
                                                :stroke-dashoffset="circumference - {{ $materiPercentage }} / 100 * circumference"
                                                class="text-hijau" />
                                        </svg>
                                        <span class="absolute text-xs">{{ round($materiPercentage, 1) }}%</span>
                                    </div>
                                    <a href="{{ route('materi.show', $userMateris->submateri->materi->id) }}"
                                        class="bg-hijau rounded-xl py-1.5 text-white text-base flex items-center justify-center gap-2 w-full">
                                        Lanjutkan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                            viewBox="0 0 25 24" fill="none">
                                            <path d="M10.5 17L15.5 12L10.5 7" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @else
                            <img src="{{ asset('assets/icon-book.png') }}" alt="Icon Book" class="w-fit mx-auto">
                            <p class="text-center">
                                Belum ada Materi yang dipelajari
                            </p>
                            <a href="{{ route('materi.index') }}"
                                class="block py-2 px-4 rounded-xl bg-hijau w-fit text-white mx-auto">Pelajari Materi</a>
                        @endif
                    </div>
                </div>
                <div class="bg-hijau-100 p-6 rounded-xl h-fit">
                    <h3 class="text-xl font-semibold mb-6">Progress Tugas</h3>
                    <div class="rounded-xl border border-hijau p-3">
                        @if ($answers)
                            <div>
                                <p>{{ $answers->subtugas->tugas->nama }}</p>
                                <p class="text-red-500">Deadline : {{ $answers->subtugas->tugas->deadline }}</p>
                                <div class="flex items-center gap-6 mt-6">
                                    <div class="flex items-center justify-center" x-data="{ circumference: 2 * 22 / 7 * 23 }">
                                        <svg class="w-16 h-16 transform -rotate-90">
                                            <circle cx="32.5" cy="32.5" r="23" stroke="currentColor"
                                                stroke-width="8" fill="transparent" class="text-abu-400" />
                                            <circle cx="32.5" cy="32.5" r="23" stroke="currentColor"
                                                stroke-width="8" fill="transparent" :stroke-dasharray="circumference"
                                                :stroke-dashoffset="circumference - {{ $answerPercentage }} / 100 * circumference"
                                                class="text-hijau" />
                                        </svg>
                                        <span class="absolute text-xs">{{ round($answerPercentage, 1) }}%</span>
                                    </div>
                                    <a href="{{ route('tugas.show', $answers->subtugas->tugas_id) }}"
                                        class="bg-hijau rounded-xl py-1.5 text-white text-base flex items-center justify-center gap-2 w-full">
                                        Lanjutkan
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
                                            viewBox="0 0 25 24" fill="none">
                                            <path d="M10.5 17L15.5 12L10.5 7" stroke="white" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        @else
                            <img src="{{ asset('assets/icon-book.png') }}" alt="Icon Book" class="w-fit mx-auto">
                            <p class="text-center my-3">
                                Belum ada tugas yang dikerjakan
                            </p>
                            <a href="{{ route('tugas.index') }}"
                                class="block py-2 px-4 rounded-xl bg-hijau w-fit text-white mx-auto">Lihat Tugas</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-5 gap-6">
                <div class="col-span-3 bg-white rounded-xl p-6 h-fit">
                    <x-siswa.dashboard.calendar />
                </div>
                <div class="col-span-2 bg-white rounded-xl p-6 h-fit">
                    <x-siswa.dashboard.absensi :absensi="$absens ? $absens->link : 'Belum'" />
                </div>
            </div>
        </div>
        <div class="col-span-1 pl-6">
            <div class="flex justify-between items-center mb-9">
                <p class="text-xl font-semibold">Profil</p>
                <a href="{{ route('profil.edit') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M17.3358 2.66416L7.58579 12.4142C7.21071 12.7892 7 13.298 7 13.8284V16C7 16.5522 7.44772 17 8 17H10.1716C10.702 17 11.2107 16.7893 11.5858 16.4142L21.3358 6.66416C22.1168 5.88311 22.1168 4.61678 21.3358 3.83573L20.1642 2.66416C19.3832 1.88311 18.1168 1.88311 17.3358 2.66416ZM10.5251 15.3535C10.4314 15.4473 10.3042 15.5 10.1716 15.5H8.5V13.8284C8.5 13.6958 8.55268 13.5686 8.64645 13.4748L18.3964 3.72482C18.5917 3.52955 18.9083 3.52956 19.1036 3.72482L20.2751 4.89639C20.4704 5.09165 20.4704 5.40824 20.2751 5.6035L10.5251 15.3535Z"
                            fill="black" />
                        <path
                            d="M10 3.74994C10 4.16416 9.66421 4.49995 9.25 4.49995H4C3.72386 4.49995 3.5 4.7238 3.5 4.99995V20C3.5 20.2761 3.72386 20.5 4 20.5H19C19.2761 20.5 19.5 20.2761 19.5 20V14.75C19.5 14.3357 19.8358 14 20.25 14C20.6642 14 21 14.3357 21 14.75V20C21 21.1045 20.1046 22 19 22H4C2.89543 22 2 21.1045 2 20V4.99995C2 3.89538 2.89543 2.99994 4 2.99994H9.25C9.66421 2.99994 10 3.33573 10 3.74994Z"
                            fill="black" />
                    </svg>
                </a>
            </div>
            <div class="flex flex-col items-center justify-center gap-4">
                @if (auth()->user()->foto == null)
                    <img src="{{ asset('assets/profil-icon.jpg') }}" alt="Profil Icon" class="size-36 rounded-full">
                @else
                    <img src="{{ asset('storage/profile/foto/' . auth()->user()->foto) }}" alt="Profil Icon"
                        class="size-36 rounded-full">
                @endif
                <p class="text-xl font-semibold">{{ auth()->user()->name }}</p>
                <p class="text-lg font-semibold">{{ auth()->user()->kelas }}</p>
                <p class="text-lg font-semibold">{{ auth()->user()->absen }}</p>
            </div>
            <div class="h-0.5 bg-abu-400 w-[95%] my-6 mx-auto"></div>
            <div class="rounded-xl p-6 bg-white">
                <div class="flex gap-2 items-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.56299 19H4.33771C3.59891 19 3 18.4011 3 17.6623V16.7893C3 16.2839 3.20077 15.7992 3.55814 15.4419C4.48135 14.5187 5 13.2665 5 11.9609V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V11.9609C19 13.2665 19.5187 14.5187 20.4419 15.4419C20.7992 15.7992 21 16.2839 21 16.7893V17.6623C21 18.4011 20.4011 19 19.6623 19H15.437C15.437 19.3565 15.4254 20.0363 15.0669 20.6873C14.4734 21.7646 13.3236 22.5 12 22.5C10.6763 22.5 9.52655 21.7646 8.93311 20.6873C8.57454 20.0363 8.56299 19.3565 8.56299 19ZM19.3812 16.5025C19.4573 16.5786 19.5 16.6818 19.5 16.7893V17.5H4.5V16.7893C4.5 16.6818 4.54273 16.5786 4.6188 16.5025C5.82331 15.298 6.5 13.6643 6.5 11.9609V9C6.5 5.96243 8.96244 3.5 12 3.5C15.0376 3.5 17.5 5.96243 17.5 9V11.9609C17.5 13.6643 18.1767 15.298 19.3812 16.5025ZM13.937 19H10.063C10.063 19.332 10.0868 19.6728 10.247 19.9636C10.3587 20.1665 10.5047 20.3479 10.6771 20.5C11.0296 20.8112 11.4928 21 12 21C12.5072 21 12.9703 20.8112 13.3229 20.5C13.4953 20.3479 13.6412 20.1665 13.753 19.9636C13.9132 19.6728 13.937 19.332 13.937 19Z"
                            fill="black" />
                        <circle cx="18" cy="5" r="3.5" fill="black" stroke="white" />
                    </svg>
                    <p class="text-xl font-semibold">Notifikasi</p>
                </div>
                <div class="space-y-6">
                    @if (count($notifikasis) == 0)
                        <p class="text-center">Belum Ada Notifikasi</p>
                    @endif
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
                            <button type="submit" {{ count($notifikasiFilter) != 0 ? 'disabled' : '' }} class="p-3 rounded-xl {{ count($notifikasiFilter) == 0 ? 'bg-hijau-200' : 'bg-hijau-100' }} block w-full relative text-left">
                                @if (count($notifikasiFilter) == 0)
                                <div class="rounded-full size-4 bg-hijau absolute -top-1 -right-1"></div>
                                @endif
                                {{ $notifikasi->pesan }}
                            </button>
                        </form>
                    @endforeach
                </div>
                <a href="{{ route('notifikasi.index') }}" class="text-hijau text-center block mt-6">Tampilkan Semua</a>
            </div>
        </div>
    </div>

    <script>
        console.log(@json($pengumumans))

        document.addEventListener('DOMContentLoaded', function() {
            var currentDate = new Date().toLocaleDateString('en-US');
            document.getElementById('datepicker-container').setAttribute('data-date', currentDate);
        });
    </script>
@endsection
