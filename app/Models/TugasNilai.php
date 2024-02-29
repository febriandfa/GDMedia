<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasNilai extends Model
{
    use HasFactory;

    protected $table = "tugas_nilais";

    protected $fillable = [
        'murid_id',
        'tugas_id',
        'nilai'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'murid_id', 'id');
    }

    public function tugas() {
        return $this->belongsTo(Tugas::class, 'tugas_id', 'id');
    }
}
