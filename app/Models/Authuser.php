<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\Authenticatable;

class Authuser extends Model implements Authenticatable
{
    use AuthenticableTrait;

    protected $table = 'user'; // Perbaiki dari $tabel menjadi $table
    protected $primaryKey = 'id_user'; // Gunakan camel case untuk primaryKey
    protected $fillable = ["nama_user","username","password",'level']; // Perbaiki dari $fillable menjadi $fillable

    public function getAuthIdentifierName()
    {
        return $this->primaryKey;
    }

    public function getAuthIdentifier()
    {
        return $this->{$this->primaryKey};
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
