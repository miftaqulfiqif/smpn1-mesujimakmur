<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiRapot extends Model
{
    protected $table = 'nilai_rapots';
    protected $fillable = [
        'id',
        'id_data_calon_siswa',
        'semester_ganjil_kelas_4',
        'semester_genap_kelas_4',
        'semester_ganjil_kelas_5',
        'semester_genap_kelas_5',
        'semester_ganjil_kelas_6',
        'average'
    ];

    public function dataCalonSiswa() {
        return $this->belongsTo(DataCalonSiswa::class, 'id_data_calon_siswa', 'id');
    }
}
