<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'price',
        'product_code',
        'squ_code',
        'count',
        'count',
        'product_image',
        'id',


    ];


    public function category(){
    	return $this->belongsTo(Category::class,'category_id','id');
    }

    public function supplier(){
    	return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
}




