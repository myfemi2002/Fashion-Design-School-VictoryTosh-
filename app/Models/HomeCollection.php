<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCollection extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_title',
        'title',
        'description',
        'image',
    ];
}
