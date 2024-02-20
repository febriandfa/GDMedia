<script defer src="https://unpkg.com/alpinejs@3.2.4/dist/cdn.min.js"></script>    

<div class="flex justify-between p-8 rounded-xl bg-hijau-200">
    <div>
        <h1 class="mb-2 text-xl font-semibold text-hijau">{{ $title }}</h1>
        <p>{{ $mapel }}</p>
    </div>
    
    <a href="{{ route('materi-guru.show', $id) }}" class="flex items-center gap-1 px-4 py-2 text-lg font-semibold text-white rounded-xl bg-hijau">
        Selengkapnya
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
            <path d="M10 17.5L15 12.5L10 7.5" stroke="currentcolor" stroke-width="3.5" stroke-linecap="round"stroke-linejoin="round"/>
        </svg>
    </a>
</div>