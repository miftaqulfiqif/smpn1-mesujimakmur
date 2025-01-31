<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    protected $table = 'visi_misis';

    protected $fillable = ['editor', 'konten'];

    protected static function boot(){
        
        parent::boot();

        static::creating(function ($visimisi){
            if(empty($visimisi->editor)){
                $visimisi->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
}
