<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenPindahan extends Model
{
    protected $fillable = [
        'id_periode',
        'nama',
        'isRequired'
    ];

    public function periode()
    {
        return $this->belongsTo(PeriodeDaftar::class, 'id_periode');
    }
}
