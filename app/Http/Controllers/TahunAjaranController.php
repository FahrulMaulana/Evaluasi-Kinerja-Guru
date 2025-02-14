<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $barang = TahunAjaran::paginate(6);

        return view("admin.tahun_ajaran", compact("barang"));
    }

    public function create()
    {
        return view("admin.create_tahun_ajaran");
    }

    public function store(Request $request){
        $request->validate( [
            "tahun_ajaran" => "required",
            "status" => "required",
        ]);

        $tahun_ajaran = new TahunAjaran();
        $tahun_ajaran->tahun_ajaran = $request->tahun_ajaran;
        $tahun_ajaran->status = $request->status;
        $tahun_ajaran->save();

        return redirect()->route("tahun_ajaran.index");
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                "tahun_ajaran2" => "required",
                "status2" => "required",
            ],
            [
                "tahun_ajaran2.required" => "Tahun Ajaran wajib diisi",
                "status2.required" => "Status wajib diisi",
            ]
        );

        $tahun_ajaran = TahunAjaran::find($id);
        $tahun_ajaran->tahun_ajaran = $request->tahun_ajaran2;
        $tahun_ajaran->status = $request->status2;
        $tahun_ajaran->save();

        return redirect()->route("tahun_ajaran.index");
    }

    public function destroy($id){
        $tahun_ajaran = TahunAjaran::find($id);
        $tahun_ajaran->delete();

        return redirect()->route("tahun_ajaran.index");
    }
}
