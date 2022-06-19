<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionSchool extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_title',
        'image',
    ];
}
