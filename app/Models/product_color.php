<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_color extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'color_id',
        'quantity',
    ];
    public function color()
    {
            return $this->belongsTo(color::class, 'color_id', 'id');
    }
}
