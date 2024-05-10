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
            <div class="flex flex-col justify-center min-h-screen px-16 bg-white">
                <h1 class="text-5xl font-bold">Masuk</h1>
                <form method="POST" action="{{ route('login') }}" class="w-full">
                    @csrf
                    <div class="flex flex-col gap-5 my-6">
                        <div>
                            <label for="email" class="block mb-2 font-semibold">Alamat Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                placeholder="Masukkan alamat email yang terdaftar" required autofocus
                                class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 font-semibold">Kata Sandi</label>
                            <input type="password" id="password" name="password" value="{{ old('password') }}"
                                placeholder="Masukkan kata sandi" required
                                class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        </div>
                    </div>
                    {{-- <a href="" class="block mb-10 text-red-500">Lupa Kata Sandi?</a> --}}
                    <div class="flex justify-center mb-4">
                        <button type="submit"
                            class="px-24 py-4 text-lg font-semibold text-white bg-hijau rounded-xl">Masuk</button>
                    </div>
                    <p class="block text-center underline text-hijau">Belum Punya Akun? <a
                            href="{{ route('register') }}">Daftar</a></p>
                </form>
            </div>
        </div>
    </main>
</body>

</html>
