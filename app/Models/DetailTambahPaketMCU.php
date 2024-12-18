<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTambahPaketMCU extends Model
{
    protected $table = 'detailtambahpaketmcu';
    protected $primaryKey = 'id_detailTambahPaketMCU';

    protected $fillable = [
        'id_paketMCU', 
        'id_layanan'
    ];

    public function paketMCU()
    {
        return $this->belongsTo(PaketMedicalCheckup::class, 'id_paketMCU');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}