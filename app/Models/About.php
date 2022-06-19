<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'section_title',
        'welcome_note',
        'about_image',
        'leadership_name',
        'leadership_position',
        'leadership_facebook',
        'leadership_twitter',
        'leadership_instragram',
        'leadership_image',
    ];
}
