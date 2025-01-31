@extends('ppdb.layouts.index')
@section('title', 'PPDB | Pendaftaran')
@section('style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
    <section class="w-full h-[100vh] px-3 md:px-10 lg:px-14 pt-16 overflow-hidden">
        <div class="flex gap-2 flex-col md:flex-row">
            <ul class="flex items-start flex-col bg-base-100 p-4 rounded-md justify-between h-fit">
                <p>
                    Silahkan membayar sebesar
                </p>
                <p class="font-bold">Rp. 200.000</p>
                <p class="mt-2">
                    Ke Nomor Rekening
                </p>
                <p class="font-bold">1231299128</p>
                <p class="mt-2">
                    Atas Nama
                </p>
                <p class="font-bold">Miftaqul Fiqi Firmansyah</p>
                <p class="mt-4">
                    Kemudian Upload Foto atau Screenshot Bukti Pembayaran di form samping
                </p>

            </ul>

            <ul id="bayar-daftar-ulang" class="flex flex-col w-full gap-4 h-screen overflow-y-auto px-5 pb-40 md:pb-28">
                <form action="{{ route('upload-bukti-bayar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- <input type="hidden" name="id_data_calon_siswa" value="{{ $calonSiswa->id }}"> --}}

                    <div>
                        <label for="" class="label font-medium"> Bukti Bayar </label>

                        {{-- Input file --}}
                        <label for="bukti_bayar"
                            class="bg-white text-gray-500 font-semibold text-base rounded max-w h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed font-[sans-serif]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500" viewBox="0 0 32 32">
                                <path
                                    d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z" />
                                <path
                                    d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z" />
                            </svg>
                            <input type="file" id="bukti_bayar" name="bukti_bayar" class="hidden" />
                            <p id="selectedFileName" class="text-xs font-medium text-gray-400 mt-2">
                            </p>
                        </label>

                        {{-- Tampilkan error untuk dokumen wajib --}}
                        @error('bukti_bayar')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        {{-- Tampilkan dokumen yang sudah diunggah --}}
                        {{-- @php
                            $uploadedDocument = $data->where('id_dokumen', $document->id)->first();
                        @endphp
                        <div class="mt-2 text-center">
                            <a href="{{ asset('storage/' . $uploadedDocument->path_url) }}" target="_blank"
                                class="text-blue-500 underline">
                                Lihat {{ $document->nama }}
                            </a>
                        </div> --}}
                    </div>

                    {{-- Tombol Submit --}}
                    <li class="flex justify-center">
                        <button type="submit" id="submit" class="btn px-10 bg-slate-950 text-white mt-4">Submit</button>
                    </li>
                </form>
            </ul>



        </div>
    </section>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.pageYOffset > 0) {
                navbar.classList.add('shadow-md');
            } else {
                navbar.classList.remove('shadow-md');
            }
        });

        document.getElementById('bukti_bayar').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const fileNameDisplay = document.getElementById('selectedFileName');

            if (file) {
                fileNameDisplay.textContent = `File yang dipilih: ${file.name}`;
                fileNameDisplay.classList.add('text-green-500');
            } else {
                fileNameDisplay.textContent = '';
            }
        });
    </script>
@endsection
