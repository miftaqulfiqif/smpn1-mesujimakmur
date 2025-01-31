<nav class="w-full fixed bg-white flex px-3 md:px-10 z-40 lg:px-14 h-16 items-center justify-between shadow-md md:shadow-none"
    id="navbar">
    <div class="dropdown md:hidden">
        <div tabindex="0" role="button" class="lg:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content bg-white rounded-box z-[10] mt-3 w-52 p-2 shadow">

            <li><a href="/ppdb/index">Home</a></li>
            <li><a href="/ppdb/pendaftaran-biodata-siswa">Ubah Data</a></li>
            @if (Auth::user()->jalur == 'zonasi')
                <li><a href="/ppdb/peringkat">Cek Peringkat</a></li>
            @elseif (Auth::user()->jalur == 'prestasi')
                <li><a href="/ppdb/peringkat-prestasi">Cek Peringkat</a></li>
            @elseif (Auth::user()->jalur == 'afirmasi')
                <li><a href="/ppdb/peringkat-afirmasi">Cek Peringkat</a></li>
            @endif
            {{-- <li><a>Bantuan</a></li> --}}
            <li>
                <form action="{{ route('logout') }}" method="post" style="display: inline">
                    @csrf
                    @method('POST')
                    <div class="border-red-500 bg-red-500 px-4 py-2 rounded-xl text-white">
                        <button type="submit"
                            style="background: none; border: none; color: inherit; cursor: pointer;">Log
                            Out</button>
                    </div>
                </form>
            </li>
        </ul>
    </div>

    <img src="{{ asset('assets/images/logo-dikdasmen 1.png') }}" class="h-10 w-10 hidden md:block" alt=""
        srcset="">
    <div class="flex space-x-16">
        <ul class="space-x-4 items-center hidden md:flex">
            {{-- <li><a href="{{ route('ppdb.index') }}"
                    class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('ppdb.index') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Pendaftaran</a>
            </li> --}}
            <li><a href="/ppdb/index"
                    class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('ppdb-index') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Home</a>
            </li>
            <li><a href="/ppdb/pendaftaran-biodata-siswa"
                    class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('ppdb.pendaftaran.biodata-siswa') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Ubah
                    Data</a>
            </li>
            @if (Auth::user()->jalur == 'zonasi')
                <li><a href="/ppdb/peringkat"
                        class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('rangking-siswa-prestasi') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Cek
                        Peringkat Zonasi</a>
                </li>
            @elseif (Auth::user()->jalur == 'prestasi')
                <li><a href="/ppdb/peringkat-prestasi"
                        class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('rangking-siswa-prestasi') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Cek
                        Peringkat Prestasi</a>
                </li>
            @elseif (Auth::user()->jalur == 'afirmasi')
                <li><a href="/ppdb/peringkat-afirmasi"
                        class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('rangking-siswa-prestasi') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Cek
                        Peringkat Afirmasi</a>
                </li>
            @endif
            {{-- <li><a href=""
                    class="px-3 h-8 rounded-md flex items-center shadow hover:shadow-md {{ Route::currentRouteNamed('ppdb.bantuan') ? 'bg-[#7A1CAC] text-white' : 'bg-white text-[#7A1CAC]' }}">Bantuan</a>
            </li> --}}
            <li>
                <form action="{{ route('logout') }}" method="post" style="display: inline">
                    @csrf
                    @method('POST')
                    <div class="border-red-500 bg-red-500 px-4 py-2 rounded-xl text-white">
                        <button type="submit"
                            style="background: none; border: none; color: inherit; cursor: pointer;">Log Out</button>
                    </div>
                </form>
            </li>
        </ul>
        {{-- <div class="relative" x-data="{ open: false }">
            <button @click="open = !open" class="flex items-center space-x-2">
                <img src="" alt="Profile Photo" class="rounded-full h-8 w-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>

            </button>
            <ul x-show="open" @click.away="open = false"
                class="absolute right-0 mt-2 bg-white p-2 rounded-md shadow-md">
                <li><a href="">Profile</a></li>
                <li><a href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a></li>
            </ul>
        </div>
        <form id="logout-form" action="" method="POST" class="hidden">
            @csrf
        </form> --}}
    </div>
</nav>
