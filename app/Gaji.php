<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';

    protected $fillable = [
        'gajibln', 'gajibonus', 'gajilembur', 'gajitotal', 'id_karyawan',
    ];

    public function karyawans() {
        return $this->hasOne('App\Karyawan','id', 'id_karyawan');
    }

}
