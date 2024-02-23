<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubmateri extends Model
{
    use HasFactory;

    protected $table = 'user_submateris';

    protected $fillable = [
        'submateri_id',
        'user_id',
        'status',
    ];

    public function submateri() {
        return $this->belongsTo(Submateri::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
