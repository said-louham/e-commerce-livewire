<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class wishlist extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_id',
        'user_id'
    ];

    public function product(){
        return $this->belongsTo(product::class,'product_id');
    }
}
