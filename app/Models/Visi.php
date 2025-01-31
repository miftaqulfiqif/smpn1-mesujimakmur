<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Visi extends Model
{
    protected $table = 'visi';

    protected $fillable = ['editor', 'konten'];

    protected static function boot(){
        
        parent::boot();

        static::creating(function ($visi){
            if(empty($visi->editor)){
                $visi->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
