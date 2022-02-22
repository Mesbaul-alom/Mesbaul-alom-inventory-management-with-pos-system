<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPos extends Model
{
    use HasFactory;

    protected $fillable=[
        'sales_date',
        'created_by',
        'customer_name',
        'item_name',
        'sales_code',
        'sales_status',
        'stock',
        'quantity',
        'price',
        'discount',
        'tex',
        'due',
        'payment_status',
        'item_name',
        'sales_code',
        'sales_status',
        'paid_payment',
        'subtotal',
        'total_discount',
        'total_amount',
        'grand_total',
    ];



}
