<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Misi extends Model
{
    protected $table = 'misi';

    protected $fillable = ['editor', 'konten'];

    protected static function boot(){
        
        parent::boot();

        static::creating(function ($misi){
            if(empty($misi->editor)){
                $misi->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
