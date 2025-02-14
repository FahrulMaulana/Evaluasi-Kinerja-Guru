<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $table = "tahun_ajaran";
    protected $primaryKey = "id";
    protected $fillable = ['tahun_ajaran', 'status'];
}
