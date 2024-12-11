<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokter';
    protected $primaryKey = 'id_dokter';

    protected $fillable = [
        'id_admin', 
        'nama_dokter', 
        'spesialis', 
        'no_telp', 
        'jam_mulai', 
        'jam_selesai', 
        'deskripsi',
        'foto'
    ];

    // Relasi dengan Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    // Relasi dengan Pendaftaran Antrian
    public function pendaftaranAntreans()
    {
        return $this->hasMany(PendaftaranAntrian::class, 'id_dokter');
    }
}