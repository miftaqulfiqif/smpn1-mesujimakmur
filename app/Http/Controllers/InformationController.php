<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\MainInformation;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function showInformation()
    {
        $newInformation = Informasi::latest()->first();
        $informations = Informasi::all();

        $mainInformation = MainInformation::latest()->first();

        return view('information', compact('newInformation', 'informations', 'mainInformation'));
    }
}
