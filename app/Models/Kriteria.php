<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = "kriteria_penilaian";
    protected $primaryKey = "id";
    protected $fillable = ['nama_kriteroa', 'bobot'];
}
