<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminContact extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'working_hours',
        'email',
        'phone_number',
        'facebook',
        'twitter',
        'instragram',
        'linkedin',
        
    ];
}
