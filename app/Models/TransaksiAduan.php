<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiAduan extends Model
{
    use HasFactory;
    protected $table = 'transaksi_aduan';
    protected $fillable = ['id_aduan', 'id_solusi', 'id_bakpk', 'tindak_lanjut'];
    protected $primaryKey = 'id_transaksi';

    public function aduan()
    {
        return $this->belongsTo('App\Models\Aduan', 'id_aduan');
    }

    public function solusi()
    {
        return $this->belongsTo('App\Models\Solusi', 'id_solusi');
    }

    public function bakpk()
    {
        return $this->belongsTo('App\Models\Bakpk', 'id_bakpk');
    }
}
