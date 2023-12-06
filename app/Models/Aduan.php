<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;
    protected $table = 'aduan';
    protected $fillable = ['id_mahasiswa', 'judul_aduan', 'detail_aduan', 'jenis_aduan', 'level_aduan', 'tanggal_kirim'];
    protected $primaryKey = 'id_aduan';

    public function transaksi_aduan()
    {
        return $this->hasMany('App\Models\TransaksiAduan', 'id_aduan');
    }

    public function mahasiswa()
    {
        return $this->belongsTo('App\Models\Mahasiswa', 'id_mahasiswa');
    }
}
