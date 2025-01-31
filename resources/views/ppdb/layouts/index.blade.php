<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        .overflow-y-auto::-webkit-scrollbar {
            display: none;
        }

        /* Track */
        .overflow-y-auto {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .notactive {
            display: none;
        }

        .active {
            display: block
        }
    </style>
    @yield('style')
</head>

<body class="bg-white">
    @include('ppdb.layouts.navbar')
    @yield('content')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @yield('script')

</body>

</html>
