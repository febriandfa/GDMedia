<a href="{{ auth()->user()->role == "murid" ? route('profil.edit') : route('profil-guru.edit') }}" class="size-14 rounded-full overflow-hidden">
    <img src="{{ asset('assets/profil-icon.jpg') }}" alt="Profil Icon" class="w-full h-full">
</a>