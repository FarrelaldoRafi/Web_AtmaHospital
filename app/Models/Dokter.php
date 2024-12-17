<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';

    protected $fillable = [
        'nama_dokter', 
        'spesialis', 
        'no_telp', 
        'jam_mulai', 
        'jam_selesai', 
        'deskripsi',
        'foto'
    ];

    // Relasi dengan Pendaftaran Antrian
    public function pendaftaranAntrian()
{
    return $this->hasMany(PendaftaranAntrian::class, 'id_dokter');
}
}