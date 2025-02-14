<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    protected $table = "penilaian";

    protected $primaryKey = "id";

    protected $fillable = ["id_guru","id_user","id_kompetensi","id_kriteria_penilaian","id_tahun_ajaran"];
}
