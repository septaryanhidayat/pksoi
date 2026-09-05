<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'location',
        'event_date',
        'status',
        'featured_image',
    ];

    protected $casts = [
        'event_date' => 'datetime',
    ];
}
