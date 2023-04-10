<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'product_id',
        'product_color_id',
        'quantity'
    ];

  
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id', 'id');
    }

    public function productColor(){
        return $this->belongsTo(product_color::class,'product_color_id',"id");
   }
}
