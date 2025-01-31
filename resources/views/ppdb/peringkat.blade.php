@extends('ppdb.layouts.index')
@section('title', 'PPDB | RANGKING')
@section('style')

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection

@section('content')
    <div class="flex flex-col overflow-x-auto shadow-md sm:rounded-lg">
        <div class="pb-4 bg-white">
            {{-- <label for="table-search" class="sr-only py-6">Search</label> --}}
            <div class="flex mt-1">
                {{-- <div class="inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div> --}}
                {{-- <input type="text" id="table-search"
                    class="block py-4 px-2 ps-10 text-sm items-center text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    placeholder="Search for items"> --}}
            </div>
        </div>

        <p class="text-xl mx-10">Periode saat ini adalah : <br>{{ $periodeDaftar->name }}</p>
        <table class="w-full text-sm text-left mt-10 rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NISN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Asal Sekolah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nilai rata - rata
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Peringkat
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($peringkatSiswa as $siswa)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa['nama_siswa'] }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $siswa['nisn'] }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $siswa['asal_sekolah'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $siswa['rata_rata_nilai'] }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $i++ }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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
