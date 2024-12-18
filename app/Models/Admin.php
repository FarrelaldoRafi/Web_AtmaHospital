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

    public function dokters()
    {
        return $this->hasMany(Dokter::class, 'id_admin');
    }

    public function layanans()
    {
        return $this->hasMany(Layanan::class, 'id_admin');
    }

    public function paketMCUs()
    {
        return $this->hasMany(PaketMedicalCheckup::class, 'id_admin');
    }
}