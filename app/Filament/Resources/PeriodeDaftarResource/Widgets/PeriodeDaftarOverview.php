<?php

namespace App\Filament\Resources\PeriodeDaftarResource\Widgets;

use App\Models\DataCalonSiswa;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PeriodeDaftarOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // Ambil periode aktif
        $periodeAktif = \App\Models\PeriodeDaftar::where('status', 1)->first();

        // Jika tidak ada periode aktif, kembalikan statistik kosong
        if (!$periodeAktif) {
            return [
                Stat::make('Tahun ajaran sekarang', 'Tidak Ada'),
                Stat::make('Total Siswa yang telah daftar', 0),
                Stat::make('Total Siswa terdaftar jalur Zonasi', 0),
                Stat::make('Total Siswa terdaftar jalur Prestasi', 0),
            ];
        }

        // Gunakan query builder untuk setiap kategori
        $calonSiswaQuery = DataCalonSiswa::where('id_periode', $periodeAktif->id);

        $totalCalonSiswa = $calonSiswaQuery->count(); // Total siswa

        $totalZonasi = DataCalonSiswa::whereHas('user', function ($query) use ($periodeAktif) {
            $query->where('jalur', 'zonasi');
        })->where('id_periode', $periodeAktif->id)->count();

        $totalPrestasi = DataCalonSiswa::whereHas('user', function ($query) use ($periodeAktif) {
            $query->where('jalur', 'prestasi');
        })->where('id_periode', $periodeAktif->id)->count();

        $totalAfiramsi = DataCalonSiswa::whereHas('user', function ($query) use ($periodeAktif) {
            $query->where('jalur', 'afirmasi');
        })->where('id_periode', $periodeAktif->id)->count();

        return [
            Stat::make('Tahun Ajaran', $periodeAktif->name),
            Stat::make('Total Siswa Daftar', $totalCalonSiswa),
            Stat::make('Total Siswa Zonasi', $totalZonasi),
            Stat::make('Total Siswa Prestasi', $totalPrestasi),
            Stat::make('Total Siswa Afirmasi', $totalAfiramsi)
        ];
    }
}
