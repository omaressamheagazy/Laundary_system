<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function details() {
        return $this->hasMany(OrderDetails::class,'order_id');
    }
    public function deliveries() {
        return $this->belongsTo(Delivery::class,'delivery_id');
    }
    
}
