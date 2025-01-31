<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>

<body>
    <div class="w-[577px] h-auto mx-auto border border-[#BB97CB] p-[53px] rounded-2xl bg-[#F9EEFF]">
        <img src="{{ $applogo ? asset('storage/' . $applogo->image_url) : asset('assets/images/logo_login.png') }}"
            alt="" class="h-[206px] mx-auto mb-4">
        <form action="/ppdb/register" method="POST">
            @csrf
            <div class="flex flex-col mb-4">
                <label for="name" class="font-bold">Nama Lengkap</label>
                <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap"
                    class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="nisn" class="font-bold">Nisn</label>
                <input type="text" id="nisn" name="nisn" placeholder="Masukkan nisn"
                    class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]" maxlength="10">
                @error('nisn')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-4">
                <label for="password" class="font-bold">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password"
                    class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col">
                <label for="password_confirmation" class="font-bold">Konfirmasi Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="Masukkan ulang password" class="p-3 rounded-xl bg-[#F9EEFF] border border-[#BB97CB]">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex flex-col mb-10">
                <label for="jalur" class="label font-bold">Jalur Pendaftaran</label>
                <select id="jalur" name="jalur"
                    class="select select-bordered w-full bg-[#F9EEFF] border border-[#BB97CB]">
                    <option value="">Pilih jalur pendaftaran</option>
                    <option value="zonasi">Zonasi</option>
                    <option value="prestasi">Prestasi</option>
                    <option value="afirmasi">Afirmasi</option>
                </select>
                @error('jalur')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="bg-[#2E073F] p-4 text-white w-full rounded-xl font-bold mb-5">Submit</button>
        </form>
    </div>
</body>

</html>
