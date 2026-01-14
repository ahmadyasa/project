<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tbpost extends Model
{
    protected $table = 'tbpost';
    protected $primaryKey = 'id_post';
    public $timestamps = false;
    protected $fillable = [
        'judul_post',
        'isi_post',
        'tgl_post',
        'id_kategori',
        'kategori',
        'status'
    ];
}
