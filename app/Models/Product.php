<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'sub_category_id',
        'child_category_id',
        'sort_price',
        'product_price_type',
        'single_image',
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    
}