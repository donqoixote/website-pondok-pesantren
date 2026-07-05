<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = [
        'nama_santri',
        'jenjang',
        'ttl',
        'nama_ortu',
        'hp',
        'alamat',
        'status',
    ];
}
