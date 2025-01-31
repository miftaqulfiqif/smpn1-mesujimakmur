@extends('ppdb.layouts.index')
@section('title', 'PPDB | HOME')
@section('style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
    <section class="w-full px-3 md:px-10 lg:px-14 pt-16 overflow-hidden">

        {{-- PESAN --}}
        @if ($pesanKesalahan)
            <div class="bg-[#ff252579] border-red-500 max-w-full p-6 rounded-3xl flex flex-row mt-10">
                <p>
                    {{ $pesanKesalahan->pesan }}
                </p>
            </div>
        @endif



        <div class="my-5">
            <p>Selamat Datang</p>
            <p class="text-3xl font-bold">{{ $namaSiswa }}</p>
            <p class="text-lg mt-2">Anda Terdaftar dengan Jalur {{ Str::upper($jalurSiswa) }}</p>
        </div>
        <div class="bg-[#FAF5FF] max-w-full p-8 rounded-3xl flex flex-row justify-between">
            <div class="flex flex-col">
                <p class="mb-6 font-bold text-lg">Biodata Anda</p>
                <div class="flex flex-col gap-2">
                    <div class="">
                        <p class="text-md">NIK</p>
                        <p class="text-lg font-bold">{{ $dataCalonSiswa->nik }}</p>
                    </div>
                    <div class="">
                        <p class="text-md">TTL</p>
                        <p class="text-lg font-bold">{{ $dataCalonSiswa->tempat_lahir }}, {{ $dataCalonSiswa->tgl_lahir }}
                        </p>
                    </div>
                    <div class="">
                        <p class="text-md">No. KIP</p>
                        @if ($dataCalonSiswa->no_kip)
                            <p class="text-lg font-bold">{{ $dataCalonSiswa->no_kip }}</p>
                        @else
                            <p class="text-lg font-bold"> - </p>
                        @endif
                    </div>
                    <div class="">
                        <p class="text-md">Alamat</p>
                        <p class="text-lg font-bold">{{ $dataCalonSiswa->alamat }}</p>
                    </div>
                    <div class="">
                        <p class="text-md">Asal Sekolah</p>
                        <p class="text-lg font-bold">{{ $dataCalonSiswa->asal_sekolah }}</p>
                    </div>
                    <div class="">
                        <p class="text-md">Zonasi</p>
                        @if ($dataCalonSiswa->zonasi && $dataCalonSiswa->zonasi == 1)
                            <p class="text-lg font-bold">Ya</p>
                        @else
                            <p class="text-lg font-bold">Tidak</p>
                        @endif
                    </div>
                    @if ($peringkatExist)
                        <div class="">
                            <p class="text-md">Anda sekarang di Peringkat</p>
                            <p class="text-lg font-bold">{{ $peringkatExist->peringkat }}</p>
                        </div>
                    @endif
                </div>
                <div class="mt-8 bg-white p-4 rounded-xl">
                    <p class="text-lg font-bold">Status Pendaftaran </p>
                    <p class="text-md">Anda Terdaftar pada Tahun Ajaran <span
                            class="font-bold">{{ $periodeDaftar->name }}</span>
                    </p>

                    @if ($statusPendaftaran->status == 'pengecekan_berkas')
                        <p class="text-lg bg-[#e1ff0065] px-4 py-2 rounded-2xl max-w-fit">Sedang Dalam Pengecekan Berkas ...
                        </p>
                    @elseif ($statusPendaftaran->status == 'proses_seleksi')
                        <p class="text-lg bg-[#fff20065] px-4 py-2 rounded-2xl max-w-fit">Sedang Dalam Proses Perangkingan
                        </p>
                        <p class="mt-4">Silahkan mengecek peringkat secara berkala</p>
                    @elseif ($statusPendaftaran->status == 'diterima')
                        <p class="text-lg bg-[#5cff3b65] px-4 py-2 rounded-2xl max-w-fit">Selamat Anda Diterima</p>
                        <p class="mt-4">Silahkan melakukan daftar ulang dengan datang ke Sekolah SMPN 1 Mesuji Makmur</p>
                        {{-- <a href="#">
                            <p class="text-sm bg-blue-500 text-white px-3 py-2 rounded-2xl max-w-fit">Bayar Daftar Ulang</p>
                        </a> --}}
                    @elseif ($statusPendaftaran->status == 'ditolak')
                        <p class="text-lg bg-[#fa000485] px-4 py-2 rounded-2xl max-w-fit">Maaf, Anda belum di terima</p>
                        <p class="mt-4">Tetap Semangat dan Jangan Putus Asa </p>
                    @else
                        <p class="text-lg bg-[#fa000485] px-4 py-2 rounded-2xl max-w-fit">Gagal ...
                        </p>
                    @endif
                </div>
            </div>
            <div class="w-[200px]">
                <img src="{{ asset('storage/' . $dataCalonSiswa->foto) }}" alt="" srcset="">
            </div>
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
    </script>
@endsection
