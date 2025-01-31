@extends('ppdb.layouts.index')
@section('title', 'PPDB | Pendaftaran')
@section('style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container .select2-selection--single {
            height: 100%;
            /* Sesuaikan tinggi dengan elemen lainnya */
            border-radius: 0.5rem;
            /* Sesuaikan dengan Tailwind atau framework lainnya */
            border: 1px solid #d1d5db;
            /* Sesuaikan warna border */
            padding: 0.7rem;
            /* Padding agar seimbang */
            background-color: white;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 1.5rem;
            /* Tinggi teks agar sejajar */
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 100%;
        }
    </style>
@endsection
@section('content')
    <section class="w-full h-[100vh] px-3 md:px-10 lg:px-14 pt-16 overflow-hidden">

        <div class="flex gap-2 flex-col md:flex-row">
            <ul class="flex items-start flex-row md:flex-col bg-base-100 p-4 rounded-md justify-between h-fit">
                <li class="hidden md:flex flex-col mb-3 justify-start bg-[#F5EBFF] w-full rounded-md p-2">
                    <progress class="progress progress-primary bg-[#7a1cac8f] w-56" value="1" max="100"></progress>
                    <span class="text-sm">0%</span>
                </li>

                <li class="flex flex-col md:flex-row items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span
                        class="ml-2 text-[10px] font-bold md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">
                        Biodata
                        Calon Siswa</span>
                </li>

                <li class="hidden md:block md:border-l-2 border-black border-dashed ml-[10px] w-10 md:w-0 h-1 md:h-10">
                </li>

                @if ($biodataOrangtua)
                    <a href="/ppdb/pendataran-biodata-orangtua">
                        <li class="flex flex-col md:flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="rgba(144, 238, 144, 0.5)"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span
                                class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">
                                Data
                                Orang Tua Calon
                                Siswa </span>
                        </li>
                    </a>
                @else
                    <li class="flex flex-col md:flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span
                            class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Data
                            Orang Tua Calon
                            Siswa</span>
                    </li>
                @endif

                <li class="hidden md:block md:border-l-2 border-black border-dashed ml-[10px] w-10 md:w-0 h-1 md:h-10">
                </li>

                @if ($nilai)
                    <a href="/ppdb/input-nilai">
                        <li class="flex flex-col md:flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="rgba(144, 238, 144, 0.5)"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span
                                class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">
                                Input Nilai</span>
                        </li>
                    </a>
                @else
                    <li class="flex flex-col md:flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span
                            class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Input
                            Nilai</span>
                    </li>
                @endif

                <li class="hidden md:block md:border-l-2 border-black border-dashed ml-[10px] w-10 md:w-0 h-1 md:h-10">
                </li>

                @if ($document)
                    <a href="{{ $route }}">
                        <li class="flex flex-col md:flex-row items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="rgba(144, 238, 144, 0.5)"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2">
                                <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span
                                class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">
                                Dokumen</span>
                        </li>
                    </a>
                @else
                    <li class="flex flex-col md:flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span
                            class="ml-2 text-[10px] md:text-[15px] max-w-[70px] text-center md:text-left md:max-w-fit">Dokumen</span>
                    </li>
                @endif

                @if ($errors->any())
                    <div class="bg-[#ff252579] border-red-500 w-full p-6 rounded-3xl flex flex-row mt-10">
                        <div>
                            <span class="text-sm mx-auto">
                                {{ $errors->first('error') ? $errors->first('error') : 'Pastikan semua data sudah terisi' }}
                            </span>
                        </div>
                    </div>
                @endif
            </ul>

            <ul id="biodata-form" class="flex flex-col w-full gap-4 h-screen overflow-y-auto px-5 pb-40 md:pb-28">
                <form action="{{ route('saveBiodataSiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="lg:flex gap-4">
                        <li class="form-control gap-1 w-full">
                            <div class="flex">
                                <label for="name" class="label font-medium">Nama Lengkap</label>

                            </div>
                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                class="input bg-white input-bordered w-full" required maxlength="255">
                            @error('name')
                                <p class="text-sm text-red-500">*</p>
                            @enderror
                        </li>
                        <li class="form-control gap-1 lg:w-1/2">
                            <div class="flex">
                                <label for="jenis_kelamin" class="label font-medium">Jenis Kelamin</label>
                                @error('jenis_kelamin')
                                    <p class="text-sm text-red-500">*</p>
                                @enderror
                            </div>
                            <select id="jenis_kelamin" name="jenis_kelamin"
                                class="select select-bordered w-full bg-white">
                                <option disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki"
                                    {{ old('jenis_kelamin', $biodata->jenis_kelamin ?? '') == 'Laki-laki' ? 'selected' : '' }}>
                                    Laki-laki</option>
                                <option value="Perempuan"
                                    {{ old('jenis_kelamin', $biodata->jenis_kelamin ?? '') == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </li>
                    </div>
                    <div class="lg:flex gap-4">
                        <li class="form-control gap-1 lg:w-full">
                            <div class="flex">
                                <label for="nik" class="label font-medium">NIK</label>
                                @error('nik')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <input type="text" id="nik" name="nik"
                                value="{{ old('nik', $biodata->nik ?? '') }}" placeholder="Masukkan NIK"
                                class="input bg-white input-bordered w-full" maxlength="16">

                        </li>
                        <li class="form-control gap-1 lg:w-1/4">
                            <div class="flex">
                                <label for="tempat_lahir" class="label font-medium">Tempat Lahir</label>
                                @error('tempat_lahir')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <input type="text" id="tempat_lahir" name="tempat_lahir"
                                value="{{ old('tempat_lahir', $biodata->tempat_lahir ?? '') }}"
                                placeholder="Masukkan Tempat Lahir" class="input bg-white input-bordered w-full">
                        </li>
                        <li class="form-control gap-1 lg:w-1/4">
                            <div class="flex">
                                <label for="tgl_lahir" class="label font-medium">Tanggal Lahir</label>
                                @error('tgl_lahir')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <input type="date" id="tgl_lahir" name="tgl_lahir"
                                value="{{ old('tgl_lahir', $biodata->tgl_lahir ?? '') }}"
                                placeholder="Pilih Tanggal Lahir" class="input bg-white input-bordered w-full">
                        </li>
                    </div>

                    <li class="form-control gap-1">
                        <div class="flex">
                            <label for="alamat" class="label font-medium">Alamat</label>
                            @error('alamat')
                                <p class="text-sm text-red-500 pt-1">*</p>
                            @enderror
                        </div>
                        <input type="text" id="alamat" name="alamat"
                            value="{{ old('alamat', $biodata->alamat ?? '') }}" placeholder="Masukkan alamat Lengkap"
                            class="input bg-white input-bordered w-full">

                    </li>

                    <div class="lg:flex gap-4">
                        <li class="form-control gap-1 lg:w-full">
                            <div class="flex">
                                <label for="penerima_kip" class="label font-medium">Penerima KIP?</label>
                                @error('penerima_kip')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <select id="penerima_kip" name="penerima_kip" class="select select-bordered w-full bg-white">
                                <option disabled selected value="">Apakah Anda penerima KIP?</option>
                                <option value="1"
                                    {{ old('penerima_kip', $biodata->penerima_kip ?? '') == 1 ? 'selected' : '' }}>Ya
                                </option>
                                <option value="0"
                                    {{ old('penerima_kip', $biodata->penerima_kip ?? '') == 0 ? 'selected' : '' }}>Tidak
                                </option>
                            </select>
                        </li>

                        <li class="form-control gap-1 w-full" id="kip_section" style="display: none;">
                            <div class="flex">
                                <label for="no_kip" class="label font-medium">Nomor KIP</label>
                                @error('no_kip')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <input type="text" id="no_kip" name="nomor_kip"
                                value="{{ old('no_kip', $biodata->no_kip ?? '') }}" placeholder="Masukkan Nomor KIP"
                                class="input bg-white input-bordered w-full">
                        </li>
                    </div>

                    <div class="lg:flex gap-4">
                        <li class="form-control gap-1 lg:w-1/2">
                            <div class="flex">
                                <label for="asal_sekolah" class="label font-medium">Asal Sekolah</label>
                                @error('asal_sekolah')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <select id="asal_sekolah" name="asal_sekolah"
                                class="select select2 select-bordered w-full bg-white">
                                @if ($biodata)
                                    @if ($biodata->asal_sekolah)
                                        <option value="{{ $biodata->asal_sekolah }}" selected>
                                            {{ $biodata->asal_sekolah }}
                                        </option>
                                    @endif
                                @endif

                            </select>
                        </li>

                        <div class="flex gap-4 lg:w-1/2">
                            <li class="form-control flex-1 gap-1">
                                <div class="flex">
                                    <label for="tinggi_badan" class="label font-medium">Tinggi Badan (Berdasarkan
                                        cm)</label>
                                    @error('tinggi_badan')
                                        <p class="text-sm text-red-500 pt-1">*</p>
                                    @enderror
                                </div>
                                <input type="text" id="tinggi_badan" name="tinggi_badan"
                                    value="{{ old('tinggi_badan', $biodata->tinggi_badan ?? '') }}"
                                    placeholder="Masukkan Tinggi Badan" class="input bg-white input-bordered w-full">
                            </li>
                            <li class="form-control flex-1 gap-1">
                                <div class="flex">
                                    <label for="berat_badan" class="label font-medium">Berat Badan (Berdasarkan
                                        kg)</label>
                                    @error('berat_badan')
                                        <p class="text-sm text-red-500 pt-1">*</p>
                                    @enderror
                                </div>
                                <input type="text" id="berat_badan" name="berat_badan"
                                    value="{{ old('berat_badan', $biodata->berat_badan ?? '') }}"
                                    placeholder="Masukkan Berat Badan" class="input bg-white input-bordered w-full">

                            </li>
                        </div>
                    </div>

                    <div class="lg:flex gap-4">

                        <li class="form-control gap-1 lg:w-1/2">
                            <div class="flex">
                                <label for="kegemaran" class="label font-medium">Kegamaran atau Hobi</label>
                                @error('kegemaran')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <input type="text" id="kegemaran" name="kegemaran"
                                value="{{ old('kegemaran', $biodata->kegemaran ?? '') }}"
                                placeholder="Masukkan Kegemaran atau Hobi" class="input bg-white input-bordered w-full">
                        </li>
                        <li class="form-control gap-1 lg:w-1/2">
                            <div class="flex">
                                <label for="notelp" class="label font-medium">Nomor Telpon</label>
                                @error('notelp')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <input type="text" id="notelp" name="notelp"
                                value="{{ old('notelp', $biodata->notelp ?? '') }}" placeholder="Masukkan Nomor Telepon"
                                class="input bg-white input-bordered w-full">
                        </li>
                    </div>

                    <div class="lg:flex gap-4">
                        <li class="form-control gap-1 w-1/2">
                            <div class="flex">
                                <label class="label font-medium">Upload Foto</label>
                                @error('foto')
                                    <p class="text-sm text-red-500 pt-1">*</p>
                                @enderror
                            </div>
                            <label for="foto"
                                class="bg-white text-gray-500 font-semibold text-base rounded max-w h-36 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed font-[sans-serif]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500"
                                    viewBox="0 0 32 32">
                                    <path
                                        d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                        data-original="#000000" />
                                    <path
                                        d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                        data-original="#000000" />
                                </svg>
                                Upload file

                                <input type="file" id='foto' name="foto" class="hidden" accept="image/*" />
                                <p id="selectedFileName" class="text-xs font-medium text-gray-400 mt-2"></p>
                                <p class="text-xs font-medium text-gray-400 mt-2">PNG, JPG and JPEG are Allowed.</p>
                            </label>
                        </li>
                        <div id="imagePreview" class="mt-4">
                            @if ($biodata && $biodata->foto)
                                <p>Preview Foto :</p>
                                <input type="hidden" name="foto_lama" value="{{ $biodata->foto }}">
                                <img id="previewImg" src="{{ asset('storage/' . $biodata->foto) }}"
                                    alt="Preview Foto Lama" width="100" />
                            @else
                                <img id="previewImg" src="" alt="Preview Foto Baru" width="100"
                                    style="display: none;" />
                            @endif
                        </div>
                    </div>

                    <li class="flex justify-center">
                        <button type="submit" id="submit"
                            class="btn px-10 bg-slate-950 text-white mt-4">Selanjutnya</button>
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

        const sekolahPilihan = [
            ' -- Pilih Sekolah Asal -- ',
            'SD Negri 1 Catur Tunggal',
            'SD Negri 2 Catur Tunggal',
            'SD Negri 1 Mukti Karya',
            'SD Negri 2 Mukti Karya',
            'SD Negri 1 Sumber Mulya',
            'SD Negri 1 Pematang Sukaramah',
            'SD Negri 1 Cahya Mulya'
        ];

        const selectElement = document.getElementById('asal_sekolah');

        sekolahPilihan.forEach(function(sekolah) {
            const option = document.createElement('option');
            option.value = sekolah;
            option.textContent = sekolah;

            // Menandai opsi yang dipilih berdasarkan old() atau biodata->asal_sekolah
            if ('{{ old('asal_sekolah', $biodata->asal_sekolah ?? '') }}' === sekolah) {
                option.selected = true;
            }

            selectElement.appendChild(option);
        });

        // Inisialisasi select2 setelah opsi ditambahkan
        $(".select2").select2({
            tags: true,
            placeholder: "Pilih salah satu atau ketik manual",
            allowClear: true
        });

        document.addEventListener('DOMContentLoaded', function() {
            const penerimaKip = document.getElementById('penerima_kip');
            const kipSection = document.getElementById('kip_section');

            const toggleKipSection = () => {
                if (penerimaKip.value === '1') {
                    kipSection.style.display = 'block';
                } else {
                    kipSection.style.display = 'none';
                }
            };

            toggleKipSection();

            penerimaKip.addEventListener('change', toggleKipSection);
        });

        document.getElementById('foto').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewImg = document.getElementById('previewImg');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('hidden');
                };

                reader.readAsDataURL(file);
            } else {
                previewImg.src = '#';
                previewImg.classList.add('hidden');
            }
        });

        document.getElementById('foto').addEventListener('change', function(event) {
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
