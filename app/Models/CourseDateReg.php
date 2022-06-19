<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDateReg extends Model
{
    use HasFactory;
    protected $fillable = [
        'course',
        'admission',
    ];
}
