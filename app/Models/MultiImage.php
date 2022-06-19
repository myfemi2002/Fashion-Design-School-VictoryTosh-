<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function collection()
    {
        return $this->belongsTo(Collections::class, 'collection_id', 'id');
    }
}
