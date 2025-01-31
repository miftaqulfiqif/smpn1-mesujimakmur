<!DOCTYPE html>
<html lang="en">

@if (session('success'))
    <div class="text-green-500">
        {{ session('success') }}
    </div>
@endif


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Home</title>
</head>

<body class="" style="">
    <img src="{{ asset('assets/images/Photo.png') }}" alt="" class="absolute mt-[300px] hidden lg:block">
    <img src="{{ asset('assets/images/Photo1.png') }}" alt=""
        class="absolute mt-[185px] right-0 hidden lg:block ">

    {{-- <div class="relative">
        <!-- Gambar pertama -->
        <img src="{{ asset('assets/images/Photo.png') }}" alt=""
            class="absolute mt-[300px] hidden lg:block md:w-[70%] sm:w-[50%] w-[30%]">

        <!-- Gambar kedua -->
        <img src="{{ asset('assets/images/Photo1.png') }}" alt=""
            class="absolute mt-[185px] right-0 hidden lg:block md:w-[70%] sm:w-[50%] w-[30%]">
    </div> --}}

    <x-navbar />
    <section class="max-w-full">
        <div class="mx-auto py-2 sm:px-6">
            <div class="mx-auto max-w-full text-center py-[47px] lg:mx-0 lg:flex-auto">
                <h2 class="text-balance text-3xl font-semibold tracking-tight text-[#2E073F] sm:text-4xl">
                    @if ($moto)
                        {{ $moto->konten }}
                    @else
                        Data Tidak Ditemukan
                    @endif
                </h2>
                <p
                    class="mt-6 text-pretty text-lg/8 font-bold  text-[#590E7A] bg-white p-1 max-w-lg mx-auto rounded-2xl shadow-lg">
                    Menginspirasi
                    Generasi
                    untuk Masa
                    Depan Lebih Cerah
                </p>
                <a href="/ppdb/login" class="flex mt-10 mb-[80px] max-w-max rounded-full mx-auto">
                    <div class="py-4 mx-auto flex px-6 bg-[#7A1CAC] rounded-full gap-x-6 shadow-xl">
                        <p class="text-white font-bold mx-auto">Daftar Sekarang</p><span>
                            <img src="{{ asset('assets/images/arrow-square-right.svg') }}" alt=""
                                srcset="">
                        </span>
                    </div>
                </a>
            </div>
            <div class="flex max-w-max mx-auto">
                <img src="{{ asset('assets/images/book.png') }}" alt="" srcset="" class="absolute"><span>
                    <p class="static text-[#590E79] max-w-[450px] pl-8 text-xl text-justify">Kami berkomitmen untuk
                        menciptakan
                        lingkungan
                        pendidikan
                        yang
                        penuh
                        inspirasi,
                        di
                        mana setiap siswa
                        didorong untuk menjadi pemimpin masa depan.</p>
                </span>
            </div>
        </div>
        <div class="w-[700px] mx-auto my-20">
            <div class="flex left-0 mb-10">
                <img src="{{ asset('assets/images/Group 1.svg') }}" alt="" srcset="" class="w-12">
                <p class="font-bold text-3xl">300 +<br><span class="font-normal text-xl">Aktif dengan Berjuta
                        Prestasi</span></p>
                <img src="{{ asset('assets/images/Group.svg') }}" alt="" class="w-16 ml-28 rotate-180">
            </div>
            <div class="flex justify-end right-0">
                <img src="{{ asset('assets/images/Group.svg') }}" alt="" class="w-16 mr-28">
                <img src="{{ asset('assets/images/Ellipse 28.svg') }}" alt="" srcset="" class="w-12">
                <p class="font-bold text-3xl">50 +<br><span class="font-normal text-xl">Pencapaian di sekolah</span>
                </p>
            </div>
        </div>
        <div class="flex flex-col xl:flex-row px-20 mt-20">
            <div class="pr-6 my-auto">
                <p class="text-6xl font-semibold text-[#7A1CAC]">
                    Selamat Datang di <br>
                    SMP Negeri 1 Mesuji Makmur
                </p>
                <p class="mt-6 text-xl">
                    Pembukaan masa pendaftaran online. Ayo Segerakan Daftarkan Diri Anda !!! dan pastikan anda akan
                    mendapatkan pendidikan yang unggul dan berkualitas.
                </p>
            </div>
            @if ($fotoSekolah)
                <img src="{{ $fotoSekolah && $fotoSekolah->image ? asset('storage/' . $fotoSekolah->image) : asset('assets/images/Component 2.png') }}"
                    alt="School Photo" class="max-h-fit">
            @endif
        </div>
    </section>

    {{-- VISI dan MISI --}}
    <section class="max-w-full">
        <div class="bg-gradient-to-b from-[#7C18CD] to-[#38085F] h-auto rounded-3xl mx-20">
            <div class="flex gap-4 mt-10 p-10">
                <div class="max-w-sm">
                    <p class="text-white font-bold text-2xl mb-4">
                        Visi
                    </p>
                    <p class="text-white">
                        @if ($visi)
                            {{ $visi->konten }}
                        @else
                            Visi Masih Kosong
                        @endif
                    </p>
                </div>
                <img src="{{ asset('assets/images/Line 17.png') }}" alt="">
                <div class="max-w-full">
                    <p class="text-white font-bold text-2xl mb-4">
                        Misi
                    </p>
                    @if ($misi->isNotEmpty())
                        @foreach ($misi as $item)
                            <table class="w-fit">
                                <tbody class="">
                                    <tr class=" text-white">
                                        <td class="w-10 text-center align-top pt-2">{{ $loop->iteration }}.</td>
                                        <td class="py-2 px-4 text-justify self-start">{{ $item->konten }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endforeach
                    @else
                        Misi Masih Kosong
                    @endif
                </div>
            </div>
            {{-- <div class="mx-auto pr-10 pb-10">
                <div class="flex items-center justify-end ">
                    <p class="text-white mr-2">Selengkapnya </p>
                    <img src="{{ asset('assets/images/arrow_right.png') }}" alt="" srcset=""
                        class="h-[11px]">
                </div>
            </div> --}}
        </div>
    </section>

    {{-- PRESTASI --}}
    <section class="max-w-full">
        <div class="mx-auto mt-20 mb-10 text-center">
            <p class="font-semibold text-3xl">Prestasi</p>
            <p class="text-2xl">Prestasi Siswa</p>
        </div>
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-end mr-20 mb-2">
                <a href="/achievment">
                    <p class="underline">Lihat Semua</p>
                </a>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @if ($prestasis)
                    @foreach ($prestasis as $index => $prestasi)
                        <a href="{{ route('detail-content', ['content' => 'prestasi', 'id' => $prestasi->id]) }}">
                            <div
                                class="border-2 border-[#AD49E1] p-6 rounded-xl {{ $index % 3 == 2 ? 'col-span-2' : '' }}">
                                <div class="bg-cover bg-center h-64 rounded-lg"
                                    style="background-image: url('{{ asset('storage/' . $prestasi->main_image) }}')">
                                </div>
                                <div class="my-5">
                                    <div class="flex">
                                        <img src="{{ asset('assets/images/Shoes.png') }}" alt=""
                                            class="h-8">
                                        <div class="ml-2">
                                            <p class="text-xl">{{ Str::limit($prestasi->nama, 50) }}</p>
                                            <p class="text-sm text-justify">{!! Str::limit($prestasi->konten, 80) !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="col-span-3 text-center">
                        <p>Data Prestasi Masih Kosong</p>
                    </div>
                @endif

            </div>
        </div>
    </section>

    {{-- INFORMASI SEKOLAH --}}
    <section class="max-w-full">
        <div class="mx-auto mt-20 mb-4 text-center">
            <p class="font-semibold text-3xl"> Informasi </p>
            <p class="text-2xl"> Informasi Sekolah</p>
        </div>
        <div class="mx-auto max-w-7xl">
            <div class="flex justify-end mr-20 mb-2">
                <a href="/information">
                    <p class="underline">Lihat Semua </p>
                </a>
            </div>
            <div class="grid grid-cols-4 gap-10">
                @if ($informasis);
                    @foreach ($informasis as $index => $informasi)
                        <a href="{{ route('detail-content', ['content' => 'informasi', 'id' => $informasi->id]) }}">
                            <div
                                class="border-2 bg-[conic-gradient(at_bottom_right,_var(--tw-gradient-stops))] from-[#2E073F] to-[#4A0B66] p-6 rounded-xl">
                                <div class="bg-cover bg-center h-52 rounded-lg"
                                    style="background-image: url('{{ asset('storage/' . $informasi->main_image) }}')">
                                </div>
                                <div class="my-5 text-white">
                                    <p class="text-sm font-bold mb-2">{{ Str::limit($informasi->nama, 50) }}</p>
                                    <div class="relative flex h-12">
                                        <p class="text-xs w-[80%] text-justify">
                                            {!! strip_tags(Str::limit($informasi->deskripsi, 80)) !!}
                                        </p>
                                        <img src="{{ asset('assets/images/arrow-square-right.svg') }}" alt=""
                                            class="absolute bottom-0 right-0">
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="col-span-4 text-center">
                        <p>Data Informasi Sekolah Masih Kosong</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <x-footer />
</body>

</html>
