<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class purchaseorder extends Model
{
    use HasFactory;

    protected $fillable = [
        'distributor_id',
        'total_amount',
        'status',
    ];

}
