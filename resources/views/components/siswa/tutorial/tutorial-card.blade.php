<div class="w-full h-72 rounded-xl bg-white shadow-md">
    <a href="{{ $sumber }}" target="_blank">
        <img src="{{ asset('storage/Tutorial/cover/' . $cover) }}" alt="Thumbnail Tutorial {{ $id }}" class="w-full h-40 rounded-t-xl object-cover object-center" />
    </a>
    <div class="p-6">
        <div class="flex items-center justify-between mb-4">
            <p class="w-56 font-semibold text-xl line-clamp-2">{{ $nama }}</p>
            <form method="POST" action="{{ $status == "Y" ? route('tutorial-tersimpan.destroy', $idstatus) : route('tutorial-tersimpan.store') }}">
            @csrf

            @if ($status == "Y")
                @method('DELETE')
            @endif

                <input type="text" id="tutorial_id" name="tutorial_id" value="{{ $id }}" class="hidden" />
                <button type="submit">
                    @if ($status == "Y")
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentcolor" class="w-6 h-6">
                            <path fill-rule="evenodd" d="M6.32 2.577a49.255 49.255 0 0 1 11.36 0c1.497.174 2.57 1.46 2.57 2.93V21a.75.75 0 0 1-1.085.67L12 18.089l-7.165 3.583A.75.75 0 0 1 3.75 21V5.507c0-1.47 1.073-2.756 2.57-2.93Z" clip-rule="evenodd" />
                        </svg>
                    @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                        </svg>
                    @endif
                    {{-- <svg class="{{ $status == "Y" ? 'text-hijau' : 'text-black' }}" xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.573 25.7551L12.3699 20.1301L4.16675 25.7551V0.833252H20.573V25.7551ZM12.3699 18.2551L19.0105 22.7864V2.39575H5.72925V22.7864L12.3699 18.2551Z" fill="currentcolor"/>
                    </svg> --}}
                </button>
            </form>
        </div>
        <a href="" class="mx-auto block max-w-40 text-center text-xs border-b border-b-black truncate">Sumber : {{ $sumber }}</a>
    </div>
</div>