<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';

    protected $fillable = [
        'nama_layanan', 
        'jenis_layanan', 
        'deskripsi',
        'foto'
    ];

    // Relasi dengan Detail Tambah Paket MCU
    public function detailTambahPaketMCUs()
    {
        return $this->hasMany(DetailTambahPaketMCU::class, 'id_layanan');
    }

    public function paketMCU()
    {
        return $this->belongsToMany(PaketMedicalCheckup::class, 'detailtambahpaketmcu', 'id_layanan', 'id_paketMCU');
    }
}