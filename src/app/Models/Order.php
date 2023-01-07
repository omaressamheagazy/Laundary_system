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

    public function trackers() {
        return $this->hasOne(tracker::class,'order_id');
    }
    public static function changeOrderStatus($order_id, $status_id) {
        $order = Order::all()->where('id', $order_id)->first();
        $order->status_id = $status_id;
        $order->save();
    }
    public static function isDriverAssigned($order_id) {
        return tracker::all()->where('order_id',$order_id)->first() == null ? false : true;
    }

    
}
