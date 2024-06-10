<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_category_id',
        'product_name',
        'description',
        'price',
        'stok_quantity',
        'image1_url',
        'image2_url',
        'image3_url',
        'image4_url',
        'image5_url',
    ];

    public function discount()
    {
        return $this->hasOne(Discounts::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Productcategories::class, 'product_category_id');
    }
}
