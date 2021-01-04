<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $fillable = [
        'name', 'tempatlahir', 'tanggallahir', 'jeniskelamin', 'agama', 'notelp', 'alamat', 'email',
    ];

    public function users()
    {
        return $this->hasOne('App\User');
    }

    public function gajis() {
        return $this->hasOne('App\Gaji', 'id_karyawan');
    }
}
