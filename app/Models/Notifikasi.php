<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasis';

    protected $fillable = [
        'pesan',
        'oleh',
        'type',
        'user_id'
    ];

    public function notifikasi_seens() {
        return $this->hasMany(NotifikasiSeen::class, 'notifikasi_id', 'id');
    }

    public function users() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
