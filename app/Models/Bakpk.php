<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;

class Bakpk extends Model implements Authenticatable
{
    use Notifiable;

    use HasFactory;
    protected $table = 'bakpk';
    protected $fillable = ['nip_bakpk', 'email', 'nama', 'password'];
    protected $primaryKey = 'id_bakpk';

    public function transaksi_aduan()
    {
        return $this->hasMany('App\Models\TransaksiAduan', 'id_bakpk');
    }

    // Implement methods from Authenticatable interface
    public function getAuthIdentifierName()
    {
        return 'id_bakpk';
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
