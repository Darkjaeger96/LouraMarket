<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'status',
        'tracking_num',
    ];
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
