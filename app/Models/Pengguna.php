<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Pengguna extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';

    protected $fillable = [
        'nama_lengkap', 
        'tanggal_lahir', 
        'alamat', 
        'no_telp', 
        'username', 
        'password', 
        'email',
        'foto_profil'
    ];

    protected $hidden = [
        'password'
    ];

    // Relasi dengan Pendaftaran Antrian
    public function pendaftaranAntreans()
    {
        return $this->hasMany(PendaftaranAntrian::class, 'id_pengguna');
    }

    // Relasi dengan Pendaftaran MCU
    public function pendaftaranMCUs()
    {
        return $this->hasMany(PendaftaranMedicalCheckup::class, 'id_pengguna');
    }
}