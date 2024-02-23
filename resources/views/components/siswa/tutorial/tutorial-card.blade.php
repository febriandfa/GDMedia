<div class="w-full h-72 rounded-xl bg-white shadow-md">
    <a href="{{ $sumber }}" target="_blank">
        <img src="{{ asset('storage/Tutorial/cover/' . $cover) }}" alt="Thumbnail Tutorial {{ $id }}" class="w-full h-40 rounded-t-xl object-cover object-center" />
    </a>
    <div class="p-6">
        <div class="flex items-center justify-between mb-4">
            <p class="w-56 font-semibold text-xl line-clamp-2">{{ $nama }}</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="26" viewBox="0 0 25 26" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.573 25.7551L12.3699 20.1301L4.16675 25.7551V0.833252H20.573V25.7551ZM12.3699 18.2551L19.0105 22.7864V2.39575H5.72925V22.7864L12.3699 18.2551Z" fill="currentcolor"/>
            </svg>
        </div>
        <a href="" class="mx-auto block max-w-40 text-center text-xs border-b border-b-black truncate">Sumber : {{ $sumber }}</a>
    </div>
</div>