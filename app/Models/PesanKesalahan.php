<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesanKesalahan extends Model
{
    protected $table = 'pesan_kesalahan';

    protected $fillable = [
        'id_data_calon_siswa',
        'pesan'
    ];

    public function dataCalonSiswa()
    {
        return $this->belongsTo(DataCalonSiswa::class, 'id_data_calon_siswa');
    }
}
