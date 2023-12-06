<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Model implements Authenticatable
{
    use Notifiable;

    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama', 'password', 'jurusan', 'prodi', 'tahun_masuk', 'status_mahasiswa'];
    protected $primaryKey = 'id_mahasiswa';

    public function aduan()
    {
        return $this->hasMany('App\Models\Aduan', 'id_mahasiswa');
    }

    // Implement methods from Authenticatable interface
    public function getAuthIdentifierName()
    {
        return 'id_mahasiswa';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
