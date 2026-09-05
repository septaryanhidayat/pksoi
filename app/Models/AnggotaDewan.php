<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaDewan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'position',
        'fraction',
        'profile_summary',
        'education',
        'photo',
        'order',
    ];
}
