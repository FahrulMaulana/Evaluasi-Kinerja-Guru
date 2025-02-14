<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kompetensi;
use Illuminate\Http\Request;

class KompetensiController extends Controller
{
    public function index()
    {
        $barang = Kompetensi::paginate(6);

        return view("admin.kompetensi", compact("barang"));
    }

    public function create()
    {
        return view("admin.create_kompetensi");
    }

    public function store(Request $request){
        $request->validate( [
            "nama_kompetensi" => "required",
        ]);

        $kompetensi = new Kompetensi();
        $kompetensi->nama_kompetensi = $request->nama_kompetensi;
        $kompetensi->save();

        return redirect()->route("kompetensi.index");
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                "nama_kompetensi2" => "required",
            ],
            [
                "nama_kompetensi2.required" => "Nama Kompetensi wajib diisi",
            ]
        );

        $kompetensi = Kompetensi::find($id);
        $kompetensi->nama_kompetensi = $request->nama_kompetensi2;
        $kompetensi->save();

        return redirect()->route("kompetensi.index");
    }

    public function destroy($id){
        $kompetensi = Kompetensi::find($id);
        $kompetensi->delete();

        return redirect()->route("kompetensi.index");
    }

}
