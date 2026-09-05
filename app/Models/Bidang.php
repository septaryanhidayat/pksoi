<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'address',
        'phone',
        'email',
        'website',
        'icon',
        'thumbnail',
        'order',
    ];

    public function getThumbnailUrlAttribute(): string
    {
        if (!empty($this->thumbnail)) {
            $path = parse_url($this->thumbnail, PHP_URL_PATH);
            return '/' . ltrim($path, '/');
        }
        return '/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp';
    }
}
