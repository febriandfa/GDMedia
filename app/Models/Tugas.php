<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'nama',
        'deskripsi',
        'deadline'
    ];

    public function subtugas() {
        return $this->hasMany(Subtugas::class, 'tugas_id', 'id');
    }

    public function tugas_nilai() {
        return $this->hasMany(TugasNilai::class, 'tugas_id', 'id');
    }
}
