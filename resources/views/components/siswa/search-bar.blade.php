<div class="w-[30rem] h-10 relative rounded-xl overflow-hidden">
    <form method="GET" action="{{ $route }}">
        @csrf
        <input type="text" id="search" name="search" placeholder="Cari..." value="{{ old('search') }}" class="w-[30rem] h-10 border-0 outline-none focus:outline-none rounded-xl pr-16">
        <button type="submit" class="absolute top-1.5 right-2.5 z-[5]">
            <label for="search">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                    <path d="M11 19.9399C15.4183 19.9399 19 16.3582 19 11.9399C19 7.52166 15.4183 3.93994 11 3.93994C6.58172 3.93994 3 7.52166 3 11.9399C3 16.3582 6.58172 19.9399 11 19.9399Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M21 21.9401L16.7 17.6401" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </label>
        </button>
    </form>
    <div class="w-[3.75rem] h-24 bg-hijau-200 absolute top-1 right-1 rotate-45 opacity-85"></div>
    <div class="w-[3.75rem] h-24 bg-hijau absolute -top-10 -right-[1.5rem] -rotate-45 opacity-85"></div>
</div>