<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id');
    }
    public function spp() {
        return $this->belongsTo(Spp::class, 'id_spp', 'id');
    }
    public function pembayaran() {
        return $this->hasMany(Pembayaran::class, 'nisn', 'nisn');
    }
}
