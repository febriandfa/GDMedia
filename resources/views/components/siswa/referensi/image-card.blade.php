<div class="group h-auto max-w-60 mb-6 relative">
    <div class="group-hover:flex hidden justify-center items-center absolute inset-0 z-[5]">
        <div class="py-2 px-3 rounded-full bg-white flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path d="M10.8125 1.90625H14.0938V5.1875M13.3906 2.60938L9.875 6.125M8.46875 2.84375H4.25C3.87704 2.84375 3.51935 2.99191 3.25563 3.25563C2.99191 3.51935 2.84375 3.87704 2.84375 4.25V11.75C2.84375 12.123 2.99191 12.4806 3.25563 12.7444C3.51935 13.0081 3.87704 13.1562 4.25 13.1562H11.75C12.123 13.1562 12.4806 13.0081 12.7444 12.7444C13.0081 12.4806 13.1562 12.123 13.1562 11.75V7.53125" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <a href="{{ $sumber }}" target="_blank" class="block max-w-40 text-xs truncate">{{ $sumber }}</a>
        </div>
    </div>
    <div class="group-hover:bg-black opacity-50 w-full h-full absolute z-[3] rounded-xl"></div>
    <img src="{{ asset('storage/Referensi/gambar/' . $gambar) }}" alt="Referensi Image {{ $id }}" class="rounded-xl">
</div>