<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class MainInformation extends Model
{
    protected $table = 'main_information';

    protected $fillable = [
        'editor',
        'title',
        'content',
        'date'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($mainInformation) {
            if (empty($mainInformation->editor)) {
                $mainInformation->editor = Auth::check() ? Auth::user()->name : 'Default Editor';
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
