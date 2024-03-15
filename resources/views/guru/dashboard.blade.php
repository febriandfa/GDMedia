@extends('layouts.guruLayout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <x-title title="Dashboard" />
    <div class="flex items-center gap-2">
        <x-siswa.profil.profil-icon />
        <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
    </div>
</div>

<div class="grid grid-cols-7 gap-6">

    @if ($pengumumans)    
    <div class="col-span-7 bg-abu-300 p-6 rounded-xl space-y-4">
        <div class="flex justify-between items-start">
            <div class="flex items-center gap-3">
                <img src="{{ auth()->user()->foto ? asset('storage/profile/foto/' . auth()->user()->foto) : asset('assets/profil-icon.jpg') }}" alt="Profil Icon" class="size-20 rounded-full">
                <div>
                    <p class="text-lg font-semibold">{{ $pengumumans->users->name }}</p>
                    <p>{{ \Carbon\Carbon::parse($pengumumans->created_at)->format('d F Y') }}</p>
                </div>
            </div>
            <button data-modal-target="default-modal-pengumuman" data-modal-toggle="default-modal-pengumuman" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 36 36" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M26.0037 3.99624L11.3787 18.6213C10.8161 19.1838 10.5 19.947 10.5 20.7426V24C10.5 24.8283 11.1716 25.5 12 25.5H15.2574C16.053 25.5 16.8161 25.184 17.3787 24.6213L32.0037 9.99624C33.1752 8.82467 33.1752 6.92517 32.0037 5.7536L30.2463 3.99624C29.0748 2.82467 27.1752 2.82467 26.0037 3.99624ZM15.7876 23.0303C15.6471 23.171 15.4563 23.25 15.2574 23.25H12.75V20.7426C12.75 20.5437 12.829 20.3529 12.9697 20.2122L27.5946 5.58723C27.8876 5.29433 28.3624 5.29434 28.6554 5.58723L30.4127 7.34459C30.7056 7.63748 30.7056 8.11236 30.4127 8.40525L15.7876 23.0303Z" fill="black"/>
                    <path d="M15 5.62491C15 6.24624 14.4963 6.74992 13.875 6.74992H6C5.58579 6.74992 5.25 7.0857 5.25 7.49992V30C5.25 30.4142 5.58579 30.75 6 30.75H28.5C28.9142 30.75 29.25 30.4142 29.25 30V22.125C29.25 21.5035 29.7537 21 30.375 21C30.9963 21 31.5 21.5035 31.5 22.125V30C31.5 31.6567 30.1569 33 28.5 33H6C4.34314 33 3 31.6567 3 30V7.49992C3 5.84307 4.34314 4.49991 6 4.49991H13.875C14.4963 4.49991 15 5.00359 15 5.62491Z" fill="black"/>
                </svg>
            </button>
        </div>
        <p>{{ $pengumumans->pesan }}</p>
    </div>
    @else
    <div class="col-span-7 bg-abu-300 p-6 rounded-xl flex items-center justify-between gap-4">
        <div class="flex gap-4 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.56299 19H4.33771C3.59891 19 3 18.4011 3 17.6623V16.7893C3 16.2839 3.20077 15.7992 3.55814 15.4419C4.48135 14.5187 5 13.2665 5 11.9609V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V11.9609C19 13.2665 19.5187 14.5187 20.4419 15.4419C20.7992 15.7992 21 16.2839 21 16.7893V17.6623C21 18.4011 20.4011 19 19.6623 19H15.437C15.437 19.3565 15.4254 20.0363 15.0669 20.6873C14.4734 21.7646 13.3236 22.5 12 22.5C10.6763 22.5 9.52655 21.7646 8.93311 20.6873C8.57454 20.0363 8.56299 19.3565 8.56299 19ZM19.3812 16.5025C19.4573 16.5786 19.5 16.6818 19.5 16.7893V17.5H4.5V16.7893C4.5 16.6818 4.54273 16.5786 4.6188 16.5025C5.82331 15.298 6.5 13.6643 6.5 11.9609V9C6.5 5.96243 8.96244 3.5 12 3.5C15.0376 3.5 17.5 5.96243 17.5 9V11.9609C17.5 13.6643 18.1767 15.298 19.3812 16.5025ZM13.937 19H10.063C10.063 19.332 10.0868 19.6728 10.247 19.9636C10.3587 20.1665 10.5047 20.3479 10.6771 20.5C11.0296 20.8112 11.4928 21 12 21C12.5072 21 12.9703 20.8112 13.3229 20.5C13.4953 20.3479 13.6412 20.1665 13.753 19.9636C13.9132 19.6728 13.937 19.332 13.937 19Z" fill="black"/>
                <circle cx="18" cy="5" r="3.5" fill="black" stroke="white"/>
            </svg>
            <p class="p-3 rounded-xl border border-hijau w-fit">Belum Ada Pengumuman Untuk Para Murid!</p>
        </div>
        <button data-modal-target="default-modal-pengumuman" data-modal-toggle="default-modal-pengumuman" type="button" class="text-2xl text-white size-12 rounded-full bg-hijau-400">+</button>
    </div>
    @endif


    <div class="col-span-4">
        <div class="rounded-xl p-6 bg-white mb-6 space-y-4">
            <div class="flex items-center justify-between">
                <p class="text-xl font-semibold">Absensi</p>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="text-lg text-white size-9 rounded-full bg-hijau-400">+</button>
            </div>
            @if ($absens)
            <div class="w-fit mx-auto">
                {!! QrCode::size(200)->generate($absens->link); !!}
            </div>
            <p class="text-center">{{ $absens->link }}</p>
            @else
            <p class="text-center">Belum Ada Absensi Segera Tambahkan!</p>
            @endif
        </div>

        <div class="rounded-xl p-6 bg-white">
            <p class="text-xl font-semibold">Hours Spent</p>
            <p class="font-medium text-hijau">Siswa Kelas XI DKV 1</p>
            <div class="relative overflow-x-auto mt-6">
                <table class="w-full text-sm text-left rtl:text-right">
                    <thead class="text-xs uppercase bg-hijau-200">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                No
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Waktu
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                            <tr class="bg-white border-b">
                                <td scope="row" class="px-6 py-4">
                                    {{ $index + 1 }}
                                </td>
                                <th class="px-6 py-4 font-medium whitespace-nowrap">
                                    {{ $user->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->total_login }} Menit
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-span-3">
        <div class="rounded-xl p-6 bg-white">
            <div class="flex gap-2 items-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.56299 19H4.33771C3.59891 19 3 18.4011 3 17.6623V16.7893C3 16.2839 3.20077 15.7992 3.55814 15.4419C4.48135 14.5187 5 13.2665 5 11.9609V9C5 5.13401 8.13401 2 12 2C15.866 2 19 5.13401 19 9V11.9609C19 13.2665 19.5187 14.5187 20.4419 15.4419C20.7992 15.7992 21 16.2839 21 16.7893V17.6623C21 18.4011 20.4011 19 19.6623 19H15.437C15.437 19.3565 15.4254 20.0363 15.0669 20.6873C14.4734 21.7646 13.3236 22.5 12 22.5C10.6763 22.5 9.52655 21.7646 8.93311 20.6873C8.57454 20.0363 8.56299 19.3565 8.56299 19ZM19.3812 16.5025C19.4573 16.5786 19.5 16.6818 19.5 16.7893V17.5H4.5V16.7893C4.5 16.6818 4.54273 16.5786 4.6188 16.5025C5.82331 15.298 6.5 13.6643 6.5 11.9609V9C6.5 5.96243 8.96244 3.5 12 3.5C15.0376 3.5 17.5 5.96243 17.5 9V11.9609C17.5 13.6643 18.1767 15.298 19.3812 16.5025ZM13.937 19H10.063C10.063 19.332 10.0868 19.6728 10.247 19.9636C10.3587 20.1665 10.5047 20.3479 10.6771 20.5C11.0296 20.8112 11.4928 21 12 21C12.5072 21 12.9703 20.8112 13.3229 20.5C13.4953 20.3479 13.6412 20.1665 13.753 19.9636C13.9132 19.6728 13.937 19.332 13.937 19Z" fill="black"/>
                    <circle cx="18" cy="5" r="3.5" fill="black" stroke="white"/>
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

                    <form method="POST" action="{{ route('notifikasi-guru.markSeen') }}">
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
            <a href="{{ route('notifikasi-guru.index') }}" class="text-hijau text-center block mt-6">Tampilkan Semua</a>
        </div>
        <div class="h-0.5 bg-abu-400 w-[95%] my-6 mx-auto"></div>
        <div class="rounded-xl p-6 bg-white">
            <x-siswa.dashboard.calendar />
        </div>
    </div>
</div>


{{-- Modal --}}
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold">
                    Tambahkan Absensi
                </h3>
                <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="{{ route('absen-guru.store') }}">
            @csrf
                <div class="p-4 md:p-5 space-y-9">
                    <div class="flex flex-col gap-8">
                        <input type="text" id="link" name="link" value="{{ old('link') }}" placeholder="Masukkan Link Absensi" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                    <button data-modal-hide="default-modal" type="submit" class="text-white bg-hijau hover:bg-hijau-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Main modal -->
<div id="default-modal-pengumuman" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold">
                    Tambahkan Pengumuman
                </h3>
                <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-pengumuman">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="{{ route('notifikasi-guru.postPengumuman') }}">
            @csrf
                <div class="p-4 md:p-5 space-y-9">
                    <div class="flex flex-col gap-8">
                        <textarea name="pesan" id="pesan" rows="6" value="{{ old('pesan') }}" placeholder="Masukkan Pengumuman" class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2"></textarea>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
                    <button data-modal-hide="default-modal-pengumuman" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                    <button data-modal-hide="default-modal-pengumuman" type="submit" class="text-white bg-hijau hover:bg-hijau-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    console.log(@json($users))
</script>
@endsection
