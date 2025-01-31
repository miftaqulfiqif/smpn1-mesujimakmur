<div>
    <div class="navbar
    bg-base-100">
        <img src="{{ $applogo ? asset('storage/' . $applogo->image_url) : asset('assets/images/logo-dikdasmen 1.png') }}"
            alt="" srcset="" class="absolute h-20 mt-10 ml-10">
        <div class="gap-5 text-[#2E073F] mx-auto font-semibold">
            <a href="/">Home</a>
            <a href="/achievment">Prestasi</a>
            <a href="/activities">Kegiatan</a>
            <a href="/information">Informasi</a>
            <a href="/ppdb/login">PPDB</a>
        </div>
    </div>
    <img src="{{ asset('assets/images/line.png') }}" alt="" srcset="" class="mx-auto">
</div>
