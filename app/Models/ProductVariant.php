<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
         'price',
        'discount',
        'discount_id',
        'selling_price',
        'variant_name',
        'sub_variant_name',
        'single_image'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}