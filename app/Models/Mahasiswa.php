<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama', 'password', 'jurusan', 'prodi', 'tahun_masuk', 'status_mahasiswa'];
    protected $primaryKey = 'id_mahasiswa';

    public function aduan()
    {
        return $this->hasMany('App\Models\Aduan', 'id_mahasiswa');
    }
}
