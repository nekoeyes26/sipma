<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PimpinanKampus extends Model
{
    use HasFactory;
    protected $table = 'pimpinan_kampus';
    protected $fillable = ['nip_pimpinan', 'email', 'nama', 'password', 'bagian'];
    protected $primaryKey = 'id_pimpinan';

    public function solusi()
    {
        return $this->hasMany('App\Models\Solusi', 'id_pimpinan');
    }
}
