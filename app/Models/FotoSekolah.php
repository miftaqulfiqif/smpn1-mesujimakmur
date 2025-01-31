<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class FotoSekolah extends Model
{
    protected $table = 'foto_sekolah';

    protected $fillable = ['editor', 'image'];

    protected static function boot(){
        
        parent::boot();

        static::creating(function ($image){
            if(empty($image->editor)){
                $image->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
