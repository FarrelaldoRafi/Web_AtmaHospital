<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendaftaranAntrian extends Model
{
    protected $table = 'pendaftaranantrian';
    protected $primaryKey = 'id_antrian';

    protected $fillable = [
        'id_pengguna', 
        'id_dokter', 
        'tanggal_antrian', 
        'namaLengkap_pasien', 
        'jenis_kelamin_pasien', 
        'tanggal_lahir_pasien', 
        'email_pasien', 
        'no_telp_pasien'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }
}