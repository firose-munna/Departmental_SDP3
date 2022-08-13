<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable=['id', 'order_id', 'product_id', 'product_name', 'product_price','product_sales_qnty'];
    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }

}
