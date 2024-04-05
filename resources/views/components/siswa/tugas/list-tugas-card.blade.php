<script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>  

<div class="p-6 bg-white rounded-xl">
    <h1 class="mb-6 text-xl font-semibold">{{ $nama }}</h1>
    <div class="p-8 border rounded-lg border-hijau">
        <h2 class="mb-2">{{ $nama }}</h2>
        <h2 class="text-red-500 mb-7">Deadline : {{ $deadline }}</h2>
        <div class="flex items-center justify-between gap-6">
            <div class="flex items-center justify-center w-fit" x-data="{ circumference: 2 * 22 / 7 * 23 }">
                <svg class="w-16 h-16 transform -rotate-90">
                    <circle cx="32.5" cy="32.5" r="23" stroke="currentColor" stroke-width="8" fill="transparent" class="text-abu-400" />
                    <circle cx="32.5" cy="32.5" r="23" stroke="currentColor" stroke-width="8" fill="transparent" :stroke-dasharray="circumference" :stroke-dashoffset="circumference - {{ $percentage }} / 100 * circumference" class="text-hijau" />
                </svg>
                <span class="absolute text-xs">{{ $percentage }}%</span>
            </div>

            @if ($nilai == "Belum Dinilai")
                <a id="linkButton" href="{{ route('tugas.show', $id) }}" class="py-2 px-8 rounded-xl text-white flex items-center gap-1 w-full justify-center {{ $kelompok == 'N' ? 'cursor-default bg-abu-400' : 'bg-hijau' }}">
                    Lanjutkan
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
                        <path d="M10.5 17L15.5 12L10.5 7" stroke="currentcolor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            @else
                <a href="{{ route('tugas.show', $id) }}" class="py-2 px-8 rounded-xl bg-white border border-hijau text-hijau flex items-center gap-1 w-full justify-center">
                    Nilai : {{ $nilai }}
                </a>
            @endif

        </div>
    </div>
</div>

@if ($kelompok == 'N')
<script>
    document.getElementById('linkButton').addEventListener('click', function(event) {
      event.preventDefault();
    });
</script>
@endif