<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class AchievmentController extends Controller
{
    public function showPrestasi(){
        $prestasis = Prestasi::all();

        return view('achievment', compact('prestasis'));
    }
}
