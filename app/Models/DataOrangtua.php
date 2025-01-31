<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataOrangtua extends Model
{
    protected $table = 'data_orangtuas';

    protected $fillable = [
        'id',
        'nama_ayah',
        'nik_ayah',
        'tgl_lahir_ayah',
        'pekerjaan_ayah',
        'pendidikan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'nik_ibu',
        'tgl_lahir_ibu',
        'pekerjaan_ibu',
        'pendidikan_ibu',
        'penghasilan_ibu',
        'id_data_calon_siswa',
    ];

    public function dataCalonSiswa()
    {
        return $this->belongsTo(DataCalonSiswa::class, 'id');
    }
}
