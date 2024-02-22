@extends('layouts.guruLayout')

@section('content')
<div class="flex justify-between items-center pb-6 mb-6 border-b-2 border-b-abu-400">
    <x-title title="Kamus Tutorial" />
    <div class="flex items-center gap-4">
        <x-siswa.search-bar />
        <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="text-[1.75rem] text-white size-14 rounded-full bg-hijau-400">+</button>
    </div>
</div>

<!-- Main modal -->
<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold">
                    Tambahkan Kamus Tutorial
                </h3>
                <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form method="POST" action="{{ route('tutorial-guru.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="p-4 md:p-5 space-y-9">
                    <div class="flex flex-col gap-8">
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Tutorial" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        <div>
                            <div id="dropzone" class="border-2 rounded-xl border-hijau-400 border-dashed p-4 cursor-pointer h-32 flex flex-col items-center justify-center gap-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17 9.00195C19.175 9.01395 20.353 9.11095 21.121 9.87895C22 10.758 22 12.172 22 15V16C22 18.829 22 20.243 21.121 21.122C20.243 22 18.828 22 16 22H8C5.172 22 3.757 22 2.879 21.122C2 20.242 2 18.829 2 16V15C2 12.172 2 10.758 2.879 9.87895C3.647 9.11095 4.825 9.01395 7 9.00195" stroke="#231F20" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M12 15V2M12 2L15 5.5M12 2L9 5.5" stroke="#231F20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <p class="text-gray-500">Unggah File</p>
                            </div>
                            <input type="file" name="cover" id="cover" class="hidden">
                        </div>
                        <input type="text" id="sumber" name="sumber" value="{{ old('sumber') }}" placeholder="Masukkan Sumber Referensi" required class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
                    <button data-modal-hide="default-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                    <button data-modal-hide="default-modal" type="submit" class="text-white bg-hijau hover:bg-hijau-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="grid grid-cols-3 gap-6">
    @foreach ($tutorials as $tutorial)
    <x-guru.tutorial.tutorial-card :id="$tutorial->id" :nama="$tutorial->nama" :sumber="$tutorial->sumber" :cover="$tutorial->cover" />
    @endforeach
</div>

@if (count($tutorials) == 0)
<div class="flex items-center justify-center" style="height: calc(100vh - 20vh)">
    <x-no-data text="Belum Ada Tutorial" />
</div>
@endif

<script>
    const dropzone = document.getElementById('dropzone');
    const inputGambar = document.getElementById('cover');

    dropzone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone.classList.add('border-hijau');
    });

    dropzone.addEventListener('dragleave', () => {
        dropzone.classList.remove('border-hijau');
    });

    dropzone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone.classList.remove('border-hijau');

        const file = e.dataTransfer.files[0];
        inputGambar.files = e.dataTransfer.files;

        // dropzone.textContent = file.name;
        dropzone.innerHTML = `
            <p class="text-gray-500">${file.name}</p>
        `;
    });

    dropzone.addEventListener('click', () => {
        inputGambar.click();
    });

    inputGambar.addEventListener('change', () => {
        // dropzone.textContent = inputGambar.files[0].name;
        dropzone.innerHTML = `
            <p class="text-gray-500">${inputGambar.files[0].name}</p>
        `;
    });
</script>
@endsection