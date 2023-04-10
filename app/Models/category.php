<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model {
    use HasFactory;
    protected $fillable=[
            'name',
            'slug',
            'description',
            'image',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'status'
    ];

    public function products()
    {
        return $this->hasMany(product::class,'category_id','id');  
    }
    public function brands()
    {
        return $this->hasMany(brand::class,'category_id','id')->where('status',0);  
    }
}
