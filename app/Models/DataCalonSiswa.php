<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCalonSiswa extends Model
{
    protected $table = 'data_calon_siswas';
    protected $fillable = [
        'id_user',
        'id_periode',
        'jenis_kelamin',
        'tempat_lahir',
        'tgl_lahir',
        'nik',
        'asal_sekolah',
        'alamat',
        'tinggi_badan',
        'berat_badan',
        'kegemaran',
        'penerima_kip',
        'no_kip',
        'zonasi',
        'foto',
        'notelp',
        'peringkat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function dataOrangtua()
    {
        return $this->hasOne(DataOrangtua::class, 'id_data_calon_siswa');
    }

    public function periode()
    {
        return $this->belongsTo(PeriodeDaftar::class, 'id_periode');
    }

    public function nilaiRapot()
    {
        return $this->hasOne(NilaiRapot::class, 'id_data_calon_siswa');
    }

    public function dokumenCalonSiswa()
    {
        return $this->hasMany(DokumenCalonSiswa::class, 'id_data_calon_siswa');
    }

    public function dokumenZonasi()
    {
        return $this->dokumenCalonSiswa()->whereHas('dokumen', fn($query) => $query->where('jalur', 'zonasi'));
    }

    public function dokumenPrestasi()
    {
        return $this->dokumenCalonSiswa()->whereHas('dokumen', fn($query) => $query->where('jalur', 'prestasi'));
    }

    public function dokumenAfirmasi()
    {
        return $this->dokumenCalonSiswa()->whereHas('dokumen', fn($query) => $query->where('jalur', 'afirmasi'));
    }

    public function statusPendaftaran()
    {
        return $this->hasOne(StatusPendaftaran::class, 'id_data_calon_siswa');
    }

    public function getStatusPendaftaran($id_data_calon_siswa)
    {
        $statusPendaftaran = $this->statusPendaftaran()->where('id_data_calon_siswa', $id_data_calon_siswa)->first();

        if ($statusPendaftaran) {
            return $statusPendaftaran->status;
        }

        return 'Status tidak ditemukan';
    }

    // public function buktiPembayaran(){
    //     return $this->hasOne(BuktiPembayaran::class, 'id_data_calon_siswa');
    // }

    public function pesanKesalahan()
    {
        return $this->hasMany(PesanKesalahan::class, 'id_data_calon_siswa');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($dataCalonSiswa) {
            $activePeriode = PeriodeDaftar::where('status', true)->first();

            if ($activePeriode) {
                $dataCalonSiswa->id_periode = $activePeriode->id;
            } else {
                throw new \Exception("Tidak ada periode aktif yang tersedia");
            }
        });
    }
}
