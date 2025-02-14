<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Authuser;
use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Authuser::paginate(6);

        return view("admin.barang", compact("barang"));
    }

    public function create()
    {
        return view("admin.create_barang");
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "nama_user" => "required",
                "username" => "required",
                "level" => "required",
            ],
            [
                "nama_user.required" => "Nama Pengguna wajib diisi",
                "username.required" => "Harga Username wajib diisi",
                "level.required" => "Level Pengguna wajib diisi",
            ]

            );
            
        $barang = new Authuser();
        $barang->nama_user = $request->nama_user;
        $barang->username = $request->username;
        $barang->level = $request->level;
        $barang->password = bcrypt('123456');
        $barang->save();

        return redirect()->route("barang.index");
    }

    public function edit($id_barang)
    {
        $barang = barang::find($id_barang);
        return view("admin.edit_barang", compact("barang"));
    }

    public function update(Request $request, $id_user)
    {;
        $request->validate(
            [
                "nama_user2" => "required",
                "username2" => "required",
                "level2" => "required",
            ],
            [
                "nama_user2.required" => "Nama Pengguna wajib diisi",
                "username2.required" => "Harga ngentot Username wajib diisi",
                "level2.required" => "Level Pengguna wajib diisi",
            ]

            );
            $barang = Authuser::find($id_user);
            $barang->nama_user = $request->nama_user2;
            $barang->username = $request->username2;
            $barang->level = $request->level2;
            $barang->save();
            return redirect()->route("barang.index");

        }

        public function destroy($id_user)
        {
            $barang = Authuser::find($id_user);
            $barang->delete();
            return redirect()->route("barang.index");
        }
}