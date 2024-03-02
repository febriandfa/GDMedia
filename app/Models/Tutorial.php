<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    use HasFactory;

    protected $table = 'tutorials';

    protected $fillable = [
        'nama',
        'cover',
        'sumber'
    ];

    public function status_tersimpan() {
        return $this->hasMany(TutorialTersimpan::class, 'tutorial_id', 'id');
    }
}
