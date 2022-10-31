<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'presensi';

    protected $attributes = [
        'is_active' => true,
    ];

    public function user(){
        return $this->belongsToMany(User::class);
    }
}
