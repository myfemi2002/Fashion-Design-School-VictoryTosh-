<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionSchoolPackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'fsclass',
        'description',
        'period',
        'price',
        'image',
    ];
}
