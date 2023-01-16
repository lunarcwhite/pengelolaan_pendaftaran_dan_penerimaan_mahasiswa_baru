<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_reg';

    protected $guarded = [];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_kode', 'kode_jurusan');
    }
    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_kode', 'kode_fakultas');
    }

}