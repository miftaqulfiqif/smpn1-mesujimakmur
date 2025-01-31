<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Applogo extends Model
{
    protected $table = 'applogos';
    
    protected $fillable = [
        'editor',
        'image_url'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($applogo) {
            if (empty($applogo->editor)) {
                $applogo->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
