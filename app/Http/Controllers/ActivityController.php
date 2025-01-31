<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function showActivity(){
        $newActivity = Kegiatan::latest()->first();
        $activities = Kegiatan::all();

        return view('activity', compact('activities', 'newActivity'));
    }
}
