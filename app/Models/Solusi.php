<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solusi extends Model
{
    use HasFactory;
    protected $table = 'solusi';
    protected $fillable = ['id_pimpinan', 'solusi', 'tanggal_solusi'];
    protected $primaryKey = 'id_solusi';

    public function transaksi_aduan()
    {
        return $this->hasOne('App\Models\TransaksiAduan', 'id_solusi');
    }

    public function pimpinan_kampus()
    {
        return $this->belongsTo('App\Models\PimpinanKampus', 'id_pimpinan');
    }
}
