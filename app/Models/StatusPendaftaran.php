<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPendaftaran extends Model
{
    protected $table = 'status_pendaftarans';

    protected $fillable = [
        'id_data_calon_siswa',
        'status',
    ];

    public function dataCalonSiswa()
    {
        return $this->belongsTo(DataCalonSiswa::class, 'id');
    }
}
