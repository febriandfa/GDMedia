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
    <div class="col-span-4">
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
                @foreach ($notifikasis as $notifikasi)
                    <div class="p-3 rounded-xl bg-hijau-200">
                        {{ $notifikasi->pesan }}
                    </div>
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

<script>
    console.log(@json($users))
</script>
@endsection
