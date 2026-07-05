<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function getCoverImageAttribute(): ?string
    {
        if (! empty($this->images) && is_array($this->images)) {
            return $this->images[0] ?? $this->image_path;
        }

        return $this->image_path;
    }
}
