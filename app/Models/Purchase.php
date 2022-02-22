<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Purchase extends Model
{
    use HasFactory;
    protected $fillable = [
        'purchase_date',
        'product_quantity',
        'product_quantity',
        'purchase_price',
        'purchase_unit',
        'purchase_note',
    ];

    public function product(){
    	return $this->belongsTo(Product::class,'product_id','id');
    }

    public function supplier(){
    	return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}

