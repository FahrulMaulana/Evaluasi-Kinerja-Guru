<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $barang = Kriteria::paginate(6);

        return view("admin.kriteria", compact("barang"));
    }

    public function create()
    {
        return view("admin.create_kriteria");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "nama_kriteria" => "required",
                "bobot" => "required",
            ],
            [
                "nama_kriteria.required" => "Nama Kriteria wajib diisi",
                "bobot.required" => "Bobot wajib diisi",
            ]

        );
        
        $kriteria = new Kriteria();
        $kriteria->nama_kriteria = $request->nama_kriteria;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();

        return redirect()->route("kriteria.index");
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view("admin.edit_kriteria", compact("kriteria"));
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                "nama_kriteria2" => "required",
                "bobot2" => "required",
            ],
            [
                "nama_kriteria2.required" => "Nama Kriteria wajib diisi",
                "bobot2.required" => "Bobot wajib diisi",
            ]

        );

        $kriteria = Kriteria::find($id);
        $kriteria->nama_kriteria = $request->nama_kriteria2;
        $kriteria->bobot = $request->bobot2;
        $kriteria->save();

        return redirect()->route("kriteria.index");
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();

        return redirect()->route("kriteria.index");
    }
   

}
