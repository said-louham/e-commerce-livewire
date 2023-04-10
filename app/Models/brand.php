<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class brand extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'slug',
        'status',
        'category_id'
    ];


    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
    
}
