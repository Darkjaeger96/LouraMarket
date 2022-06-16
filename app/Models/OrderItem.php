<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'prod_id',
        'price',
        'quantity',
    ];

    //Obtener los productos que posee el artículo de pedido
       public function products(): BelongsTo{
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }

}
