<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kompetensi extends Model
{
    protected $table = "kompetensi";
    protected $primaryKey = "id";
    protected $fillable = ['nama_kompetensi'];
}

