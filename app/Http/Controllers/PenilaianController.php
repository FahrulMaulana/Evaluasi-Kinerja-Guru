<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kompetensi;
use App\Models\Kriteria;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $data = Penilaian::all();
        $kompetensi = Kompetensi::all();
        $guru = Guru::all();
        $bobot = Kriteria::all();
        return view("admin.penilaian", compact("data",'kompetensi', 'guru', 'bobot'));
    }
}
