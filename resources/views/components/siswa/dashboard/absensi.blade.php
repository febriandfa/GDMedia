<div>
    <h3 class="text-xl font-semibold mb-6">Absensi</h3>
    <div class="rounded-xl border border-hijau p-3 mb-6">
        {{-- <img src="{{ asset('assets/absen.png') }}" alt="Absensi Image" class="w-fit mx-auto"> --}}
        @if ($absensi == "Belum")
            <p class="text-center">Belum Ada Absensi</p>
        @else
            <div class="w-fit mx-auto">
                {!! QrCode::size(200)->generate($absensi); !!}
            </div>
        @endif
    </div>
    <p class="text-center">Desain Grafis</p>
    <p class="text-center">XI DKV 1</p>
</div>