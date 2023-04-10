<?php

namespace App\Models;

use App\Models\color;
use App\Models\product;
use App\Models\product_color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'order_id',
        'product_id',
        'product_color_id',
        'quantity',
        'price',
    ];
    /**
     * Get the user that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(product::class, 'product_id');
    }
    /**
     * Get the user that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productColor(): BelongsTo
    {
        return $this->belongsTo(product_color::class, 'product_color_id', 'id');
    }
}
