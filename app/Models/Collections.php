<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    use HasFactory;
    protected $fillable = [
        'collection_name',
        'collection_amount',
        'collection_description',
        'collection_category',
        'collection_thumbnail',
    ];
}
