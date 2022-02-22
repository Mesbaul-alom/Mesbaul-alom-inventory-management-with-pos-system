<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
     protected $fillable=[
        'product_id',
        'supplier_id',
        'product_add_date',
        'product_stock_count',
    ];

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }
    public function purchase(){
    	return $this->belongsTo(Purchase::class,'purchases_id','id');
    }
}
