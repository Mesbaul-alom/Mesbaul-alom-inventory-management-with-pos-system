<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;
use App\Models\Product;

class ProductReturn extends Model
{
    use HasFactory;

    protected $fillable   = ['product_id','supplier_id','purchase_id','return_quantiy','approve_status'];






    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }

    public function supplier(){
    	return $this->belongsTo(Supplier::class,'supplier_id','id');
    }


}


