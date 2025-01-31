<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PeringkatCalonSiswaPrestasi extends Model
{
    protected $fillable = [
        'id_data_calon_siswa',
        'id_nilai',
        'id_periode',
        'peringkat'
    ];

    public function dataCalonSiswa()
    {
        return $this->belongsTo(DataCalonSiswa::class, 'id_data_calon_siswa', 'id');
    }

    public function nilaiSiswa()
    {
        return $this->hasMany(NilaiRapot::class, 'id_data_calon_siswa', 'id_data_calon_siswa');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeDaftar::class, 'id_periode', 'id');
    }

    public static function getPeringkat($idDataCalonSiswa)
    {
        $siswa = DataCalonSiswa::where('id', $idDataCalonSiswa)->first();
        $jalurSiswa = $siswa->user->jalur;

        $periodeSiswa = PeriodeDaftar::where('id', $siswa->id_periode)->first();
        if ($jalurSiswa == 'zonasi') {
            $kuotaSiswa = $periodeSiswa->kuota;
        } else if ($jalurSiswa == 'prestasi') {
            $kuotaSiswa = $periodeSiswa->kuota_prestasi;
        } else if ($jalurSiswa == 'afirmasi') {
            $kuotaSiswa = $periodeSiswa->kuota_afirmasi;
        }

        $peringkatSiswa = PeringkatCalonSiswaPrestasi::with(['dataCalonSiswa.user', 'nilaiSiswa'])
            ->where('id_periode', $periodeSiswa->id)
            ->get()
            ->map(function ($siswa) {
                // Menghitung rata-rata nilai dari semester yang ada
                $rataRataNilai = $siswa->nilaiSiswa->average('average'); // Pastikan kolom 'average' ada pada model NilaiRapot
                return [
                    'id_siswa' => $siswa->dataCalonSiswa->id,
                    'nama_siswa' => $siswa->dataCalonSiswa->user->name,
                    'nisn' => $siswa->dataCalonSiswa->user->nisn,
                    'asal_sekolah' => $siswa->dataCalonSiswa->asal_sekolah,
                    'rata_rata_nilai' => $rataRataNilai,
                    'id_periode' => $siswa->id_periode,
                ];
            })
            ->sortByDesc('rata_rata_nilai'); // Mengurutkan berdasarkan rata-rata nilai
        $peringkat = array_search($idDataCalonSiswa, array_column($peringkatSiswa->toArray(), 'id_siswa')) + 1;

        PeringkatCalonSiswaPrestasi::where('id_data_calon_siswa', $idDataCalonSiswa)->update([
            'peringkat' => $peringkat
        ]);

        DataCalonSiswa::where('id_periode', $periodeSiswa->id)
            ->whereHas('user', function ($q) {
                $q->where('jalur', 'prestasi');
            })
            ->get()
            ->each(function ($item) use ($peringkatSiswa) {
                $peringkat = array_search($item->id, array_column($peringkatSiswa->toArray(), 'id_siswa')) + 1;
                $item->update([
                    'peringkat' => $peringkat
                ]);
            });


        $statusPendaftaran = StatusPendaftaran::where('id_data_calon_siswa', $idDataCalonSiswa)->first();

        $currentDate = Carbon::now()->format('Y-m-d');
        $periodeEnd = $periodeSiswa->end_date;

        if ($currentDate > $periodeEnd) {
            if ($kuotaSiswa >= $peringkat) {
                $statusPendaftaran->update([
                    'status' => 'diterima'
                ]);
            } else {
                $statusPendaftaran->update([
                    'status' => 'ditolak'
                ]);
            }

            return redirect()->route('ppdb-index');
        }
        return $peringkat;
    }
}
