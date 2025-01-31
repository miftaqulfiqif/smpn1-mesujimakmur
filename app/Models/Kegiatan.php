<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'kegiatans';
    protected $fillable = [
        'editor',
        'nama',
        'main_image',
        'images',
        'deskripsi',
        'tanggal',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected static function boot(){
        parent::boot();

        static::creating(function($kegiatan){
            if(empty($kegiatan->editor)) {
                $kegiatan->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
