<div class="flex items-center justify-between p-8 bg-white rounded-xl">
    <div class="flex items-center gap-6">
        <h1 class="text-[2rem] text-hijau">{{ $index }}</h1>
        <div class="w-0.5 rounded-full h-16 bg-black"></div>
        <div>
            <h1 class="mb-2 text-xl font-semibold text-hijau">{{ $title }}</h1>
            <p>{{ $desc }}</p>
        </div>
    </div>
    <a href="{{ route('submateri.show', $id) }}" class="flex items-center px-10 py-2 text-lg font-semibold text-white rounded-xl bg-hijau">
        Pelajari
    </a>
</div>