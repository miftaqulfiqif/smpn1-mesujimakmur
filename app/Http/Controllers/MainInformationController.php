<?php

namespace App\Http\Controllers;

use App\Models\MainInformation;
use Illuminate\Http\Request;

class MainInformationController extends Controller
{
    public function showMainInformation()
    {
        $mainInformation = MainInformation::latest()->first();
        return view('main-information', compact('mainInformation'));
    }
}
