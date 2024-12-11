<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';

    protected $fillable = [
        'id_admin', 
        'nama_layanan', 
        'jenis_layanan', 
        'deskripsi',
        'foto'
    ];

    // Relasi dengan Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }

    // Relasi dengan Detail Tambah Paket MCU
    public function detailTambahPaketMCUs()
    {
        return $this->hasMany(DetailTambahPaketMCU::class, 'id_layanan');
    }
}