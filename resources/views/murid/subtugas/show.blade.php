@extends('layouts.siswaLayout')

@section('content')
<div class="mb-6 flex flex-col gap-6">
    <x-itemtitle main="Tugas" :mainLink="route('tugas.index')" :sub="$subtugases->tugas->nama" :subLink="route('tugas.show', $subtugases->tugas_id)" :item="$subtugases->tahap" />
    <x-title :title="$subtugases->tahap" />
    <p class="text-lg font-semibold text-red-500">Deadline : {{ $subtugases->tugas->deadline }}</p>
</div>

<div class="bg-white rounded-xl p-8">
    <p class="text-justify mb-9">{{ $subtugases->deskripsi }}</p>
    <form method="POST" action="{{ route('tugas-answer.store') }}" enctype="multipart/form-data">
    @csrf
        <div class="space-y-6">
            <input type="text" id="subtugas_id" name="subtugas_id" value="{{ $subtugases->id }}" class="hidden" />
            <div>
                <div id="dropzone" class="border-2 rounded-xl border-hijau-400 border-dashed p-4 cursor-pointer h-32 flex flex-col items-center justify-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M17 9.00195C19.175 9.01395 20.353 9.11095 21.121 9.87895C22 10.758 22 12.172 22 15V16C22 18.829 22 20.243 21.121 21.122C20.243 22 18.828 22 16 22H8C5.172 22 3.757 22 2.879 21.122C2 20.242 2 18.829 2 16V15C2 12.172 2 10.758 2.879 9.87895C3.647 9.11095 4.825 9.01395 7 9.00195" stroke="#231F20" stroke-width="1.5" stroke-linecap="round"/>
                            <path d="M12 15V2M12 2L15 5.5M12 2L9 5.5" stroke="#231F20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-gray-500">Unggah File</p>
                </div>
                <input type="file" name="file" id="file" class="hidden" />
            </div>
            <input type="text" id="link" name="link" value="{{ old('link') }}" placeholder="Masukkan Link" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
            <textarea name="catatan" id="catatan" rows="6" value="{{ old('catatan') }}" placeholder="Masukkan Catatan" class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2"></textarea>
        </div>
        <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
            <a href="{{ route('tugas.show', $subtugases->tugas->id) }}" class="block py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Batal</a>
            <button type="submit" class="text-white bg-hijau hover:bg-hijau-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
        </div>
    </form>
</div>

<script>
    console.log(@json($subtugases))

    // Handle Drag n Drop Upload
    const dropzone = document.getElementById('dropzone');
    const inputGambar = document.getElementById('file');

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
        dropzone.innerHTML = `
            <p class="text-gray-500">${file.name}</p>
        `;
    });

    dropzone.addEventListener('click', () => {
        inputGambar.click();
    });

    inputGambar.addEventListener('change', () => {
        dropzone.innerHTML = `
            <p class="text-gray-500">${inputGambar.files[0].name}</p>
        `;
    });
</script>
@endsection