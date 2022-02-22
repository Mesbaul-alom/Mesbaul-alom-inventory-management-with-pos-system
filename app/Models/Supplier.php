<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
     protected $fillable=[
        'name',
        'father_name',
        'mother_name',
        'permanent_address',
        'present_address',
        'email',
        'mobile_number',
        'image',
        'username',
        'password',
     


    ];
}
