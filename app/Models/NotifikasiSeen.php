<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotifikasiSeen extends Model
{
    use HasFactory;

    protected $table = 'notifikasi_seens';

    protected $fillable = [
        'notifikasi_id',
        'user_id',
        'is_seen'
    ];

    public function notifikasis() {
        return $this->belongsTo(Notifikasi::class, 'notifikasi_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
