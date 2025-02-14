<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = "guru";
    protected $primaryKey = "id";
    protected $fillable = ['nama', 'nip', 'jabatan', 'mata_pelajar'];
}
