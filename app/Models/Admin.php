<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';

    protected $fillable = [
        'username', 
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    // Relasi dengan Dokter
    public function dokters()
    {
        return $this->hasMany(Dokter::class, 'id_admin');
    }

    // Relasi dengan Layanan
    public function layanans()
    {
        return $this->hasMany(Layanan::class, 'id_admin');
    }

    // Relasi dengan Paket MCU
    public function paketMCUs()
    {
        return $this->hasMany(PaketMedicalCheckup::class, 'id_admin');
    }
}