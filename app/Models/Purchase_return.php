<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase_return extends Model
{
    use HasFactory;
    protected $fillable=[
        'product_name',
        'supplier_name',
        'return_quantity',
    ];
}
