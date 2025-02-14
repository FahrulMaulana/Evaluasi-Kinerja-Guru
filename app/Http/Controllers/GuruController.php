<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $barang = Guru::paginate(6);

        return view("admin.guru", compact("barang"));
    }

    public function create()
    {
        return view("admin.create_barang");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "nama" => "required",
                "nip" => "required",
                "jabatan" => "required",
                "mata_pelajar"=> "required",
            ],
            [
                "nama.required" => "Nama Pengguna wajib diisi",
                "nip.required" => "Harga nip wajib diisi",
                "jabatan.required" => "jabatan Pengguna wajib diisi",
                'mata_pelajar.required' => "mata pelajaran wajib diisi",
            ]

            );
            
        $guru = new Guru();
        $guru->nama = $request->nama;
        $guru->nip = $request->nip;
        $guru->jabatan = $request->jabatan;
        $guru->mata_pelajar = $request->mata_pelajar;
        $guru->save();

        return redirect()->route("guru.index");
    }

    public function edit($id)
    {
        $barang = Guru::find($id);
        return view("admin.edit_barang", compact("barang"));
    }

    public function update(Request $request, $id)
    {;
        $request->validate(
            [
                "nama2" => "required",
                "nip2" => "required",
                "jabatan2" => "required",
                "mata_pelajar2"=> "required",
            ],
            [
                "nama2.required" => "Nama Pengguna wajib diisi",
                "nip2.required" => "Harga nip wajib diisi",
                "jabatan2.required" => "jabatan Pengguna wajib diisi",
                'mata_pelajar2.required' => "mata pelajaran wajib diisi",
            ]

            );
            $barang = Guru::find($id);
            $barang->nama = $request->nama2;
            $barang->nip = $request->nip2;
            $barang->jabatan = $request->jabatan2;
            $barang->mata_pelajar = $request->mata_pelajar2;
            $barang->save();
            return redirect()->route("guru.index");

        }

        public function destroy($id)
        {
            $barang = Guru::find($id);
            $barang->delete();
            return redirect()->route("guru.index");
        }
}
