<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <title>Document</title>
</head>

<body>
    @if ($content)
        <div class="container">
            <img src="{{ asset('storage/' . $content->main_image) }}" alt="Main Image" class="main-image">
            <div class="image-gallery">
                <div class="image-wrapper">
                    @foreach ($content->images as $image)
                        <img src="{{ asset('storage/' . $image) }}" alt="Image {{ $loop->index }}"
                            class="gallery-image">
                    @endforeach
                </div>
            </div>

            <div class="content-header">
                <p class="content-title"> {{ $content->nama }} </p>
                <p class="content-date"> {{ $content->tanggal }} </p>
            </div>

            <div class="content-description">
                @if ($content->deskripsi != null)
                    <p>{!! $content->deskripsi !!}</p>
                @else
                    <p>{{ $content->konten }}</p>
                @endif
            </div>
        </div>
    @else
        <div class="max-w-4xl flex flex-col mx-10 my-20 lg:mx-auto">
            <p>Data Tidak Ditemukan</p>
        </div>
    @endif


</body>

</html>
