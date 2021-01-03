<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    protected $table = 'todolists';

    protected $fillable = [
        'judul', 'isi', 'batas', 'id_creator', 'id_user',
    ];

    public function forCreators()
    {
        return $this->hasOne('App\User', 'id', 'id_creator');
    }


    public function forUsers()
    {
        return $this->hasOne('App\User', 'id', 'id_user');
    }
}
