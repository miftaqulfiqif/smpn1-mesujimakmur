<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodeDaftar extends Model
{
    protected $table = 'periode_daftars';

    protected $fillable = [
        'editor',
        'name',
        'start_date',
        'end_date',
        'status',
        'jml_pendaftar',
        'kuota',
        'kuota_prestasi',
        'kuota_afirmasi',
    ];

    public function editor()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function dokumens()
    {
        return $this->hasMany(Dokumen::class, 'id_periode');
    }
    public function dokumensPrestasi()
    {
        return $this->hasMany(DokumenPrestasi::class, 'id_periode');
    }
    public function dokumensAfirmasi()
    {
        return $this->hasMany(DokumenAfirmasi::class, 'id_periode');
    }

    public function siswas()
    {
        return $this->hasMany(DataCalonSiswa::class, 'id_periode');
    }
}
