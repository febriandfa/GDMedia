@extends('layouts.siswaLayout')

@section('content')
    <div class="mb-6 flex flex-col gap-6">
        <x-subtitle main="Tugas" sub="Pembagian Kelompok" />
        <x-title title="Pembagian Kelompok" />
    </div>

    <div class="space-y-6">
        @foreach ($kelompoks as $kelompok)
        <div class="w-full p-8 rounded-xl border-b border-b-hijau bg-white flex items-center justify-between">
            <p class="text-xl font-semibold">{{ $kelompok->name }}</p>
            <form method="POST" action="{{ route('gabung-kelompok.store') }}">
            @csrf
                <input type="text" id="id" name="id" value="{{ auth()->user()->id }}" class="hidden">
                <input type="text" id="kelompok_id" name="kelompok_id" value="{{ $kelompok->id }}" class="hidden">
                <button type="submit" class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Gabung</button>
            </form>
        </div>
        @endforeach
    </div>
            {{-- @forelse ($kelompoks as $kelompok)
                <form method="POST" action="{{ route('gabung-kelompok.store') }}">
                    @csrf
                    <select name="id" id="" hidden>
                        <option value="{{ Auth::user()->id }}" selected></option>
                    </select>
                    <select name="kelompok_id" id="" hidden>
                        <option value="{{ $kelompok->id }}" selected></option>
                    </select>

                    <p class="text-xl font-semibold">{{ $kelompok->name }}</p>


                    <button type="submit"
                        class="py-2 px-8 rounded-xl bg-hijau text-white text-lg font-semibold">Gabung</button>
                </form>
            @empty
                <h4>Belum ada kelompok</h4>
            @endforelse --}}

        {{-- </div>
    </div> --}}

<script>
    console.log(@json($kelompoks))
</script>

@endsection
