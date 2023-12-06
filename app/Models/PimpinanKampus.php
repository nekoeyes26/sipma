<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class PimpinanKampus extends Model implements Authenticatable
{
    use Notifiable;
    
    use HasFactory;
    protected $table = 'pimpinan_kampus';
    protected $fillable = ['nip_pimpinan', 'email', 'nama', 'password', 'bagian'];
    protected $primaryKey = 'id_pimpinan';

    public function solusi()
    {
        return $this->hasMany('App\Models\Solusi', 'id_pimpinan');
    }

    // Implement methods from Authenticatable interface
    public function getAuthIdentifierName()
    {
        return 'id_pimpinan';
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
