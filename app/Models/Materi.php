<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materis';

    protected $fillable = [
        'nama',
        'mata_pelajaran',
        'deskripsi',
        'capaian'
    ];

    public function submateri() {
        return $this->hasMany(Submateri::class, 'materi_id', 'id');
    }
}
