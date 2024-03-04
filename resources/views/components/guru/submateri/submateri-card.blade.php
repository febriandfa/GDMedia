<div class="p-8 rounded-xl bg-white border-b border-hijau my-8">
    <div class="flex justify-between items-center">
        <h3 class="text-xl font-semibold">
            Materi Pembelajaran
        </h3>
        <div class="flex items-center gap-3">
            <button data-modal-target="default-modal-edit-sub-{{ $id }}" data-modal-toggle="default-modal-edit-sub-{{ $id }}" type="button" class="text-[1.75rem] text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 35 35" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M25.282 3.88528L11.0633 18.1041C10.5163 18.651 10.209 19.393 10.209 20.1665V23.3334C10.209 24.1387 10.8619 24.7917 11.6673 24.7917H14.8342C15.6077 24.7917 16.3496 24.4844 16.8966 23.9374L31.1154 9.71861C32.2543 8.57958 32.2543 6.73285 31.1154 5.59382L29.4068 3.88528C28.2678 2.74625 26.421 2.74625 25.282 3.88528ZM15.3498 22.3906C15.2131 22.5274 15.0276 22.6042 14.8342 22.6042H12.3965V20.1665C12.3965 19.9731 12.4733 19.7876 12.6101 19.6508L26.8287 5.43208C27.1135 5.14731 27.5753 5.14732 27.8601 5.43208L29.5685 7.14061C29.8533 7.42537 29.8533 7.88706 29.5685 8.17182L15.3498 22.3906Z" fill="black"/>
                    <path d="M14.5827 5.46863C14.5827 6.0727 14.093 6.56239 13.4889 6.56239H5.83268C5.42998 6.56239 5.10352 6.88884 5.10352 7.29156V29.1666C5.10352 29.5693 5.42998 29.8958 5.83268 29.8958H27.7077C28.1103 29.8958 28.4368 29.5693 28.4368 29.1666V21.5104C28.4368 20.9062 28.9266 20.4166 29.5306 20.4166C30.1346 20.4166 30.6243 20.9062 30.6243 21.5104V29.1666C30.6243 30.7774 29.3186 32.0833 27.7077 32.0833H5.83268C4.22185 32.0833 2.91602 30.7774 2.91602 29.1666V7.29156C2.91602 5.68073 4.22185 4.37488 5.83268 4.37488H13.4889C14.093 4.37488 14.5827 4.86457 14.5827 5.46863Z" fill="black"/>
                </svg>
            </button>
            <button data-modal-target="default-modal-delete-sub-{{ $id }}" data-modal-toggle="default-modal-delete-sub-{{ $id }}" type="button" class="text-[1.75rem] text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 35 35" fill="none">
                    <path d="M17.4993 4.01047C16.8206 4.01026 16.1586 4.22053 15.6043 4.6123C15.0501 5.00407 14.631 5.55807 14.4048 6.19797C14.3047 6.46692 14.1029 6.68577 13.8429 6.80731C13.5829 6.92884 13.2856 6.94334 13.0151 6.84767C12.7445 6.752 12.5224 6.55382 12.3966 6.29588C12.2708 6.03794 12.2515 5.74089 12.3427 5.4688C12.7197 4.40226 13.4182 3.47885 14.3418 2.82573C15.2654 2.17261 16.3689 1.8219 17.5001 1.8219C18.6313 1.8219 19.7347 2.17261 20.6583 2.82573C21.582 3.47885 22.2804 4.40226 22.6575 5.4688C22.7542 5.74244 22.7382 6.04329 22.6131 6.30516C22.488 6.56702 22.2639 6.76846 21.9903 6.86515C21.7166 6.96185 21.4158 6.94588 21.1539 6.82076C20.8921 6.69563 20.6906 6.47161 20.5939 6.19797C20.3675 5.55819 19.9484 5.00431 19.3942 4.61257C18.84 4.22083 18.178 4.01048 17.4993 4.01047ZM4.00977 8.75005C4.00977 8.45997 4.125 8.18177 4.33012 7.97665C4.53524 7.77153 4.81344 7.6563 5.10352 7.6563H29.8952C30.1853 7.6563 30.4635 7.77153 30.6686 7.97665C30.8737 8.18177 30.9889 8.45997 30.9889 8.75005C30.9889 9.04013 30.8737 9.31833 30.6686 9.52345C30.4635 9.72857 30.1853 9.8438 29.8952 9.8438H5.10352C4.81344 9.8438 4.53524 9.72857 4.33012 9.52345C4.125 9.31833 4.00977 9.04013 4.00977 8.75005ZM8.62539 12.323C8.60605 12.0335 8.4725 11.7635 8.25412 11.5725C8.03574 11.3814 7.75041 11.285 7.46091 11.3043C7.17141 11.3237 6.90145 11.4572 6.71042 11.6756C6.51938 11.894 6.42293 12.1793 6.44227 12.4688L7.11893 22.6071C7.24289 24.4767 7.34352 25.9876 7.57977 27.1746C7.82622 28.4069 8.24331 29.4365 9.10664 30.243C9.96852 31.0509 11.0243 31.3994 12.2712 31.5613C13.47 31.7188 14.9837 31.7188 16.8591 31.7188H18.141C20.015 31.7188 21.5302 31.7188 22.7289 31.5613C23.9743 31.3994 25.0302 31.0509 25.8935 30.243C26.7554 29.4365 27.1725 28.4055 27.4189 27.1746C27.6552 25.9876 27.7543 24.4767 27.8798 22.6071L28.5564 12.4688C28.5758 12.1793 28.4793 11.894 28.2883 11.6756C28.0972 11.4572 27.8273 11.3237 27.5378 11.3043C27.2483 11.285 26.963 11.3814 26.7446 11.5725C26.5262 11.7635 26.3926 12.0335 26.3733 12.323L25.7025 22.3855C25.5712 24.3498 25.4779 25.7178 25.2737 26.7459C25.0739 27.7448 24.7969 28.2728 24.3987 28.6461C23.9991 29.0194 23.4537 29.2615 22.4446 29.3928C21.4048 29.5284 20.0339 29.5313 18.0637 29.5313H16.935C14.9662 29.5313 13.5954 29.5284 12.5541 29.3928C11.545 29.2615 10.9996 29.0194 10.6 28.6461C10.2018 28.2728 9.92477 27.7448 9.72497 26.7459C9.52081 25.7178 9.42747 24.3498 9.29622 22.3855L8.62539 12.323Z" fill="#E70303"/>
                    <path d="M13.7457 14.9537C14.0342 14.9248 14.3224 15.0116 14.5469 15.1951C14.7714 15.3786 14.9139 15.6437 14.943 15.9322L15.6722 23.2239C15.6935 23.5084 15.6029 23.79 15.4196 24.0086C15.2362 24.2272 14.9748 24.3655 14.6909 24.3941C14.407 24.4226 14.1233 24.3391 13.9001 24.1613C13.6769 23.9836 13.532 23.7257 13.4963 23.4427L12.7672 16.151C12.7383 15.8625 12.8251 15.5743 13.0086 15.3498C13.1921 15.1253 13.4572 14.9828 13.7457 14.9537ZM22.2347 16.151C22.256 15.8665 22.1654 15.5849 21.9821 15.3663C21.7987 15.1477 21.5373 15.0094 21.2534 14.9808C20.9695 14.9523 20.6858 15.0358 20.4626 15.2135C20.2394 15.3913 20.0945 15.6492 20.0588 15.9322L19.3297 23.2239C19.3083 23.5084 19.399 23.79 19.5823 24.0086C19.7656 24.2272 20.0271 24.3655 20.3109 24.3941C20.5948 24.4226 20.8786 24.3391 21.1018 24.1613C21.3249 23.9836 21.4698 23.7257 21.5055 23.4427L22.2347 16.151Z" fill="#E70303"/>
                </svg>
            </button>
        </div>
    </div>
    <div class="p-4 md:p-5 space-y-9">
        <div class="border border-abu-500 rounded-xl p-7 mb-9">
            <p>{{ $title }}</p>
        </div>
        <div class="border border-abu-500 rounded-xl p-7 mb-9">
            <h3 class="font-semibold text-lg mb-3">Deskripsi</h3>
            <p>{{ $desc }}</p>
        </div>
        <div class="border border-abu-500 rounded-xl p-7 mb-9 flex gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                <path d="M19.9845 7.85011L15.0145 2.99011C14.8768 2.85227 14.713 2.74324 14.5327 2.66941C14.3525 2.59558 14.1593 2.55842 13.9645 2.56011H7.06445C6.40141 2.56011 5.76553 2.82351 5.29669 3.29235C4.82785 3.76119 4.56445 4.39707 4.56445 5.06011V19.9401C4.5663 20.6026 4.83029 21.2374 5.29873 21.7058C5.76717 22.1743 6.40198 22.4383 7.06445 22.4401H17.9345C18.5969 22.4383 19.2317 22.1743 19.7002 21.7058C20.1686 21.2374 20.4326 20.6026 20.4345 19.9401V8.92011C20.4349 8.72073 20.3952 8.52329 20.3179 8.33949C20.2406 8.1557 20.1272 7.98928 19.9845 7.85011ZM18.7145 8.00011H16.3745C15.9766 8.00011 15.5951 7.84208 15.3138 7.56077C15.0325 7.27947 14.8745 6.89794 14.8745 6.50011V4.25011L18.7145 8.00011ZM19.4345 19.9401C19.4345 20.3379 19.2764 20.7195 18.9951 21.0008C18.7138 21.2821 18.3323 21.4401 17.9345 21.4401H7.06445C6.66663 21.4401 6.2851 21.2821 6.00379 21.0008C5.72249 20.7195 5.56445 20.3379 5.56445 19.9401V5.06011C5.56445 4.66229 5.72249 4.28076 6.00379 3.99945C6.2851 3.71815 6.66663 3.56011 7.06445 3.56011H13.8745V6.50011C13.8745 7.16316 14.1378 7.79904 14.6067 8.26788C15.0755 8.73672 15.7114 9.00011 16.3745 9.00011H19.4345V19.9401Z" fill="currentcolor"/>
            </svg>
            <p>{{ $file }}</p>
        </div>
    </div>
</div>

{{-- Modal Edit --}}
<div id="default-modal-edit-sub-{{ $id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-between p-4 md:p-5 rounded-t">
                <h3 class="text-xl font-semibold">
                    Edit Materi Pembelajaran
                </h3>
                <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-edit-sub-{{ $id }}">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <form method="POST" action="{{ route('submateri-guru.update', $id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="p-4 md:p-5 space-y-9">
                    <div class="flex flex-col gap-8">
                        <input type="text" id="nama" name="nama" value="{{ $title }}" placeholder="Masukkan Nama Elemen" required autofocus class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">
                        <textarea name="deskripsi" id="deskripsi" rows="6" value="{{ $desc }}" placeholder="Masukkan Deskripsi" class="w-full px-4 py-2 border-2 outline-none border-hijau-400 rounded-xl focus:border-hijau focus:border-2">{{ $desc }}</textarea>
                        <div>
                            <div id="dropzone{{$id}}" class="border-2 rounded-xl border-hijau-400 border-dashed p-4 cursor-pointer h-32 flex flex-col items-center justify-center gap-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M17 9.00195C19.175 9.01395 20.353 9.11095 21.121 9.87895C22 10.758 22 12.172 22 15V16C22 18.829 22 20.243 21.121 21.122C20.243 22 18.828 22 16 22H8C5.172 22 3.757 22 2.879 21.122C2 20.242 2 18.829 2 16V15C2 12.172 2 10.758 2.879 9.87895C3.647 9.11095 4.825 9.01395 7 9.00195" stroke="#231F20" stroke-width="1.5" stroke-linecap="round"/>
                                        <path d="M12 15V2M12 2L15 5.5M12 2L9 5.5" stroke="#231F20" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <p class="text-gray-500">{{ $file }}</p>
                            </div>
                            <input type="file" name="file" id="file{{$id}}" class="hidden">
                        </div>
                    </div>
                </div>
                <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
                    <button data-modal-hide="default-modal-edit-sub-{{ $id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                    <button data-modal-hide="default-modal-edit-sub-{{ $id }}" type="submit" class="text-white bg-hijau hover:bg-hijau-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Delete --}}
<div id="default-modal-delete-sub-{{ $id }}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <div class="relative bg-white rounded-lg shadow">
            <div class="flex items-center justify-end p-4 md:p-5 rounded-t">
                <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="default-modal-delete-sub-{{ $id }}">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="w-full px-5">
                <div class="w-full h-full rounded-xl border border-abu-500 p-7 flex flex-col justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" viewBox="0 0 46 46" fill="none">
                        <path d="M23 5.65628C22.1274 5.65602 21.2761 5.92636 20.5635 6.43007C19.851 6.93377 19.3121 7.64606 19.0213 8.46878C18.8926 8.81458 18.6331 9.09595 18.2989 9.25222C17.9646 9.40848 17.5824 9.42712 17.2345 9.30411C16.8866 9.18111 16.601 8.92631 16.4393 8.59467C16.2776 8.26303 16.2527 7.88111 16.37 7.53128C16.8548 6.16002 17.7528 4.97278 18.9403 4.13305C20.1278 3.29332 21.5465 2.84241 23.0009 2.84241C24.4554 2.84241 25.874 3.29332 27.0616 4.13305C28.2491 4.97278 29.1471 6.16002 29.6319 7.53128C29.7562 7.88311 29.7357 8.26991 29.5748 8.6066C29.4139 8.94328 29.1259 9.20227 28.7741 9.32659C28.4222 9.45091 28.0354 9.43038 27.6987 9.26951C27.3621 9.10864 27.1031 8.82061 26.9788 8.46878C26.6876 7.64621 26.1487 6.93408 25.4362 6.43041C24.7237 5.92674 23.8726 5.65629 23 5.65628ZM5.65625 11.75C5.65625 11.3771 5.80441 11.0194 6.06813 10.7557C6.33185 10.4919 6.68954 10.3438 7.0625 10.3438H38.9375C39.3105 10.3438 39.6681 10.4919 39.9319 10.7557C40.1956 11.0194 40.3438 11.3771 40.3438 11.75C40.3438 12.123 40.1956 12.4807 39.9319 12.7444C39.6681 13.0081 39.3105 13.1563 38.9375 13.1563H7.0625C6.68954 13.1563 6.33185 13.0081 6.06813 12.7444C5.80441 12.4807 5.65625 12.123 5.65625 11.75ZM11.5906 16.3438C11.5658 15.9716 11.3941 15.6245 11.1133 15.3789C10.8325 15.1332 10.4657 15.0092 10.0934 15.0341C9.72122 15.059 9.37413 15.2307 9.12852 15.5114C8.8829 15.7922 8.75889 16.1591 8.78375 16.5313L9.65375 29.5663C9.81313 31.97 9.9425 33.9125 10.2463 35.4388C10.5631 37.0232 11.0994 38.3469 12.2094 39.3838C13.3175 40.4225 14.675 40.8707 16.2781 41.0788C17.8194 41.2813 19.7656 41.2813 22.1769 41.2813H23.825C26.2344 41.2813 28.1825 41.2813 29.7238 41.0788C31.325 40.8707 32.6825 40.4225 33.7925 39.3838C34.9006 38.3469 35.4369 37.0213 35.7537 35.4388C36.0575 33.9125 36.185 31.97 36.3463 29.5663L37.2163 16.5313C37.2411 16.1591 37.1171 15.7922 36.8715 15.5114C36.6259 15.2307 36.2788 15.059 35.9066 15.0341C35.5343 15.0092 35.1675 15.1332 34.8867 15.3789C34.6059 15.6245 34.4342 15.9716 34.4094 16.3438L33.5469 29.2813C33.3781 31.8069 33.2581 33.5657 32.9956 34.8875C32.7387 36.1719 32.3825 36.8507 31.8706 37.3307C31.3569 37.8107 30.6556 38.1219 29.3581 38.2907C28.0212 38.465 26.2588 38.4688 23.7256 38.4688H22.2744C19.7431 38.4688 17.9806 38.465 16.6419 38.2907C15.3444 38.1219 14.6431 37.8107 14.1294 37.3307C13.6175 36.8507 13.2613 36.1719 13.0044 34.8875C12.7419 33.5657 12.6219 31.8069 12.4531 29.2813L11.5906 16.3438Z" fill="#E70303"/>
                        <path d="M18.1714 19.7263C18.5423 19.6891 18.9129 19.8007 19.2015 20.0366C19.4902 20.2726 19.6734 20.6135 19.7108 20.9844L20.6483 30.3594C20.6757 30.7252 20.5592 31.0872 20.3235 31.3683C20.0878 31.6493 19.7516 31.8272 19.3866 31.8639C19.0217 31.9005 18.6568 31.7932 18.3699 31.5647C18.0829 31.3361 17.8967 31.0046 17.8508 30.6406L16.9133 21.2656C16.8761 20.8947 16.9877 20.5242 17.2237 20.2355C17.4596 19.9468 17.8005 19.7637 18.1714 19.7263ZM29.0858 21.2656C29.1132 20.8998 28.9967 20.5378 28.761 20.2568C28.5253 19.9757 28.1891 19.7978 27.8241 19.7612C27.4592 19.7245 27.0943 19.8318 26.8074 20.0603C26.5204 20.2889 26.3342 20.6205 26.2883 20.9844L25.3508 30.3594C25.3233 30.7252 25.4399 31.0872 25.6755 31.3683C25.9112 31.6493 26.2474 31.8272 26.6124 31.8639C26.9774 31.9005 27.3422 31.7932 27.6292 31.5647C27.9161 31.3361 28.1024 31.0046 28.1483 30.6406L29.0858 21.2656Z" fill="#E70303"/>
                    </svg>
                    <p class="font-semibold text-xl">Hapus Materi?</p>
                </div>
            </div>
            <div class="flex items-center p-4 md:p-5 rounded-b gap-4 justify-end w-full">
                <button data-modal-hide="default-modal-delete-sub-{{ $id }}" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100">Tutup</button>
                <form method="POST" action="{{ route('submateri-guru.destroy', $id) }}">
                @csrf
                @method('DELETE')
                    <button data-modal-hide="default-modal-delete" type="submit" class="text-white bg-red-500 hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle Drag n Drop Upload
    var id = @json($id);
    const dropzone{{$id}} = document.getElementById('dropzone' + id);
    const inputGambar{{$id}} = document.getElementById('file' + id);

    dropzone{{$id}}.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropzone{{$id}}.classList.add('border-hijau');
    });

    dropzone{{$id}}.addEventListener('dragleave', () => {
        dropzone{{$id}}.classList.remove('border-hijau');
    });

    dropzone{{$id}}.addEventListener('drop', (e) => {
        e.preventDefault();
        dropzone{{$id}}.classList.remove('border-hijau');

        const file = e.dataTransfer.files[0];
        inputGambar{{$id}}.files = e.dataTransfer.files;
        dropzone{{$id}}.innerHTML = `
            <p class="text-gray-500">${file.name}</p>
        `;
    });

    dropzone{{$id}}.addEventListener('click', () => {
        inputGambar{{$id}}.click();
    });

    inputGambar{{$id}}.addEventListener('change', () => {
        dropzone{{$id}}.innerHTML = `
            <p class="text-gray-500">${inputGambar{{$id}}.files[0].name}</p>
        `;
    });
</script>