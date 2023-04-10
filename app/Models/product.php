<?php

namespace App\Models;

use App\Models\color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'category_id',
    ];
    public function Category(){
         return $this->belongsTo(Category::class,'category_id');
    }

    public function productImages(){
         return $this->hasMany(product_image::class,'product_id',"id");
    }
 
    public function productColor(){
         return $this->hasMany(product_color::class,'product_id',"id");
    }
}
