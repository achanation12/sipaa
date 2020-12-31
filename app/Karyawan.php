<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'tempatlahir', 'tanggallahir', 'jeniskelamin', 'agama', 'notelp', 'alamat', 'pendidikan', 'email',
    ];

    public function users()
    {
        return $this->hasOne('App\User');
    }
}