<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TutorialTersimpan extends Model
{
    use HasFactory;

    protected $table = 'tutorial_tersimpans';

    protected $fillable = [
        'user_id',
        'tutorial_id',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tutorial() {
        return $this->belongsTo(Tutorial::class, 'tutorial_id');
    }
}
