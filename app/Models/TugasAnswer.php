<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasAnswer extends Model
{
    use HasFactory;

    protected $table = 'tugas_answers';

    protected $fillable = [
        'user_id',
        'subtugas_id',
        'catatan',
        'file',
        'link',
        'feedback'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function subtugas() {
        return $this->belongsTo(Subtugas::class, 'subtugas_id', 'id');
    }
}
