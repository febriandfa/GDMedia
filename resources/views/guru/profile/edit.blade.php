@extends('layouts.guruLayout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <x-title title="Profil" />
    <div class="flex items-center gap-2">
        <x-siswa.profil.profil-icon />
        <p class="text-lg font-semibold">{{ auth()->user()->name }}</p>
    </div>
</div>

<div class="rounded-xl bg-white p-6">
    <div class="mb-6">
        <x-title title="Edit Profil" />
    </div>
    
    <form action="" class="flex items-center justify-center gap-12">
        <div class="relative w-fit">
            <img id="previewImage" src="{{ asset('assets/profil-icon.jpg') }}" alt="" class="size-60 rounded-full object-cover">
            <label for="foto" class="bg-white rounded-full w-fit p-1.5 block cursor-pointer absolute right-4 top-48 border-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 36 36" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M26.0037 3.99624L11.3787 18.6213C10.8161 19.1838 10.5 19.947 10.5 20.7426V24C10.5 24.8283 11.1716 25.5 12 25.5H15.2574C16.053 25.5 16.8161 25.1839 17.3787 24.6213L32.0037 9.99623C33.1752 8.82466 33.1752 6.92517 32.0037 5.75359L30.2463 3.99624C29.0748 2.82466 27.1752 2.82466 26.0037 3.99624ZM15.7876 23.0302C15.6471 23.1709 15.4563 23.25 15.2574 23.25H12.75V20.7426C12.75 20.5437 12.829 20.3529 12.9697 20.2122L27.5946 5.58722C27.8876 5.29432 28.3624 5.29433 28.6554 5.58722L30.4127 7.34458C30.7056 7.63747 30.7056 8.11235 30.4127 8.40524L15.7876 23.0302Z" fill="black"/>
                    <path d="M15 5.62491C15 6.24624 14.4963 6.74992 13.875 6.74992H6C5.58579 6.74992 5.25 7.0857 5.25 7.49992V30C5.25 30.4142 5.58579 30.75 6 30.75H28.5C28.9142 30.75 29.25 30.4142 29.25 30V22.125C29.25 21.5035 29.7537 21 30.375 21C30.9963 21 31.5 21.5035 31.5 22.125V30C31.5 31.6567 30.1569 33 28.5 33H6C4.34314 33 3 31.6567 3 30V7.49992C3 5.84307 4.34314 4.49991 6 4.49991H13.875C14.4963 4.49991 15 5.00359 15 5.62491Z" fill="black"/>
                </svg>
                <input type="file" id="foto" name="foto" class="hidden" accept="image/*" onchange="previewFile()">
            </label>
        </div>
        <div class="w-1/2 space-y-6">
            <div class="w-full">
                <label for="email" class="block mb-2 font-semibold">Alamat Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email yang terdaftar" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
            </div>
            <div class="w-full">
                <label for="name" class="block mb-2 font-semibold">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
            </div>
            <div class="w-full">
                <label for="nip" class="block mb-2 font-semibold">NIP</label>
                <input type="text" id="nip" name="nip" value="{{ old('nip') }}" placeholder="Masukkan NIP" required class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
            </div>
            <button type="submit" class="bg-hijau py-3 px-4 rounded-xl text-white font-semibold">Simpan Perubahan</button>
        </div>
    </form>
</div>


<script>
    function previewFile() {
        var preview = document.getElementById('previewImage');
        var fileInput = document.getElementById('foto');
        var file = fileInput.files[0];

        var reader = new FileReader();

        reader.onloadend = function () {
            preview.src = reader.result;
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            preview.src = "{{ asset('assets/profil-icon.jpg') }}"; // Default image if no file selected
        }
    }
</script>
@endsection