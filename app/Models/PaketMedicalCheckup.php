<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaketMedicalCheckup extends Model
{
    protected $table = 'paketmedicalcheckup';
    protected $primaryKey = 'id_paketMCU';

    protected $fillable = [
        'nama_paket', 
        'deskripsi', 
        'harga'
    ];

    // Relasi dengan Detail Tambah Paket MCU
    public function detailTambahPaketMCUs()
    {
        return $this->hasMany(DetailTambahPaketMCU::class, 'id_paketMCU');
    }

    // Relasi dengan Pendaftaran MCU
    public function pendaftaranMCUs()
    {
        return $this->hasMany(PendaftaranMedicalCheckup::class, 'id_paketMCU');
    }
}