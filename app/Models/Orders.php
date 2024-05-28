<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'order_date',
        'total_amount',
        'status',
    ];

    public function orderDetails()
    {
        return $this->hasMany(Orderdetails::class, 'order_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function delivery()
    {
        return $this->hasOne(Deliveries::class, 'order_id');
    }


}
