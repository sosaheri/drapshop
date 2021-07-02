<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        protected $fillable = [
        'product_name',
        'product_type',
        'product_amount',
        'product_price',
        'product_total',
        'product_liable'
    ];
}
