<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tracker extends Model
{
    use HasFactory;
    protected $fillable = ['driver_id', 'order_id', 'id'];
    public function driver() {
        return $this->belongsTo(User::class,'driver_id');
    }
    public function orders() {
        return $this->belongsTo(Order::class,'order_id');
    }

}
