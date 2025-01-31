<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <title>Main Information</title>
</head>

<body>
    @if ($mainInformation)
        <div class="container">
            <div class="content-header">
                <p class="content-title"> {{ $mainInformation->title }} </p>
                <p class="content-date"> {{ $mainInformation->date }} </p>
            </div>

            <div class="content-description">
                {!! $mainInformation->content !!}
            </div>
        </div>
    @else
        <div class="max-w-4xl flex flex-col mx-10 my-20 lg:mx-auto">
            <p>Data Tidak Ditemukan</p>
        </div>
    @endif


</body>

</html>
