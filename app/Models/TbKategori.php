<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbKategori extends Model
{
    protected $table = 'tbkategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;
    protected $fillable = [
        'nama_kategori'
    ];
}
    