<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function details() {
        return $this->hasMany(OrderDetails::class,'order_id');
    }
    public function deliveries() {
        return $this->belongsTo(Delivery::class,'delivery_id');
    }
    public function statuses() {
        return $this->belongsTo(OrderStatus::class,'status_id');
    }
    
}
