<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class KaryaSantri extends Model
{
    protected $table = 'karya_santri';

    protected $fillable = [
        'title',
        'author',
        'class',
        'category',
        'content',
        'image_path',
        'is_approved',
    ];

    protected function casts(): array
    {
        return [
            'is_approved' => 'boolean',
        ];
    }

    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('is_approved', true);
    }
}
