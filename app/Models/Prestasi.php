<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $table = 'prestasis';

    protected $fillable = [
        'editor',
        'nama',
        'main_image',
        'images',
        'konten',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($prestasi) {
            if (empty($prestasi->editor)) {
                $prestasi->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
