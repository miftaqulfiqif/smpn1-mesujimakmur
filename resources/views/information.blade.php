<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informasi Sekolah</title>
    @vite('resources/css/app.css')
    <style>
        .relative {
            position: relative;
        }

        .gradient-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /* Sesuaikan tinggi gradien */
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 1) 100%);
            z-index: 1;
        }

        .content {
            position: relative;
            z-index: 2;
            /* Agar konten berada di atas gradien */
        }
    </style>
</head>

<body>
    <x-navbar />
    <section class="my-20">
        @if ($mainInformation)
            <div class="flex mx-20 items-center gap-4">
                <div class="relative justify-center h-96 max-h-full basis-1/2">
                    <p class="text-3xl font-bold mb-4 font-[#2E073F]">{{ $mainInformation->title }}</p>
                    <p class="font-semibold mb-4">{{ $mainInformation->editor }}</p>
                    <p>
                        {!! Str::limit($mainInformation->content, 800) !!}
                    </p>
                    <div class="absolute flex items-center bottom-0">
                        <a href="{{ route('main-information') }}">
                            <p class="mr-4">Baca Selengkapnya</p>

                        </a>
                        <img src="{{ asset('assets/images/send.png') }}" alt="" srcset="">
                    </div>
                </div>
            </div>
        @else
            <div class="flex items-center mx-auto">
                <p>
                    Data Informasi Terbaru Kosong
                </p>
            </div>
        @endif
    </section>
    <section>
        <img src="{{ asset('assets/images/line.png') }}" alt="" srcset="" class="mx-auto">
        <div class="flex mx-20 items-center max-w-full mt-20">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto max-w-7xl">
                @if ($informations->isNotEmpty())
                    @foreach ($informations as $index => $information)
                        <a href="{{ route('detail-content', ['content' => 'informasi', 'id' => $information->id]) }}">
                            <div class="relative max-w-xs shadow-xl mb-10">
                                <!-- Gambar -->
                                <div class="bg-cover bg-center w-[300px] h-[250px]"
                                    style="background-image: url('{{ asset('storage/' . $information->main_image) }}')">
                                </div>

                                <!-- Overlay Gradien -->
                                <div class="gradient-overlay"></div>

                                <!-- Konten -->
                                <div class="content bg-white p-4 gap-4">

                                    <p class="font-bold text-xl py-2">{{ $information->nama }}</p>
                                    <p class="font-semibold text-sm pb-2">{{ $information->editor }}</p>
                                    <p class="text-sm mb-8">
                                        {!! Str::limit($information->deskripsi, 50) !!}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else
                    <div class="relative items-center">
                        Data Informasi Masih Kosong
                    </div>
                @endif
            </div>
        </div>
    </section>
</body>

</html>
