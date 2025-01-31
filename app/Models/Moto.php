<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Moto extends Model
{
    protected $table = 'motos';
    
    protected $fillable = [
        'editor',
        'konten'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($moto) {
            if (empty($moto->editor)) {
                $moto->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
