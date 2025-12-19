<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbmhs extends Model
{
    protected $table = 'tbmhs';
    protected $primarykey = 'id_mhs';
    protected $fillable = [
        'nama_mhs',
        'alamat',
        'id_fakultas'
    ];
}
