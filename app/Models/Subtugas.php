<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtugas extends Model
{
    use HasFactory;

    protected $table = 'subtugas';

    protected $fillable = [
        'tugas_id',
        'tahap',
        'deskripsi'
    ];

    public function tugas() {
        return $this->belongsTo(Tugas::class, 'tugas_id', 'id');
    }

    public function tugas_answer() {
        return $this->hasMany(TugasAnswer::class, 'subtugas_id', 'id');
    }
}
