<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GDMedia') }}</title>
    <link rel="icon" href="{!! asset('assets/logo.png') !!}" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite('resources/css/app.css')
</head>

<body>
    <main>
        <div class="grid grid-cols-2">
            <div>
                <div class="fixed flex items-center justify-center w-1/2 h-full col-span-1 bg-hijau-200">
                    <img src="{{ asset('assets/logo.png') }}" alt="Logo GDMedia" class="w-[30rem]">
                </div>
            </div>
            <div class="flex flex-col justify-center min-h-screen px-16 py-16 bg-white">
                <h1 class="text-5xl font-bold">Daftar</h1>
                <form method="POST" action="{{ route('register') }}" class="w-full">
                    @csrf
                    <div class="flex flex-col gap-5 my-6">
                        <div>
                            <label for="email" class="block mb-2 font-semibold">Alamat Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan alamat email" required autofocus
                                class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        </div>
                        <div>
                            <label for="name" class="block mb-2 font-semibold">Nama</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                placeholder="Masukkan nama" required
                                class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        </div>
                        <div>
                            <label for="kelas" class="block mb-2 font-semibold">Kelas</label>
                            <input type="text" id="kelas" name="kelas" value="{{ old('kelas') }}"
                                placeholder="Masukkan kelas" required
                                class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        </div>
                        <div>
                            <label for="absen" class="block mb-2 font-semibold">No. Absen</label>
                            <input type="text" id="absen" name="absen" value="{{ old('absen') }}"
                                placeholder="Masukkan no. absen" required
                                class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 font-semibold">Kata Sandi</label>
                            <input type="password" id="password" name="password" value="{{ old('password') }}"
                                placeholder="Masukkan kata sandi" required
                                class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        </div>
                    </div>
                    <div class="flex justify-center mb-4">
                        <button type="submit"
                            class="px-24 py-4 text-lg font-semibold text-white bg-hijau rounded-xl">Daftar</button>
                    </div>
                    <p class="block text-center underline text-hijau">Sudah Punya Akun? <a
                            href="{{ route('login') }}">Masuk</a></p>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
