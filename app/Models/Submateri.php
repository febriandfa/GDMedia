<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submateri extends Model
{
    use HasFactory;

    protected $table = 'submateris';

    protected $fillable = [
        'materi_id',
        'nama',
        'deskripsi',
        'file'
    ];

    public function materi() {
        return $this->belongsTo(Materi::class);
    }
}
