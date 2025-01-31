<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\Kegiatan;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class DetailContentController extends Controller
{
    public function showContent($content, $id)
    {

        if ($content == 'prestasi') {
            $content = Prestasi::findOrFail($id);
        } else if ($content == 'informasi') {
            $content = Informasi::findOrFail($id);
        } else if ($content == 'kegiatan') {
            $content = Kegiatan::findOrFail($id);
        } else {
            $content = 'Tidak Ditemukan Detail Content';
        }

        return view('detail-content', compact('content'));
    }
}
