<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    public function statuses() {
        return $this->belongsTo(RequestStatus::class,'status_id');
    }
    public static function isCarUsed() {
        $isCarused = false;
        $cars = Car::all();
        foreach ($cars as $car) {
            if($car['in_use'] == 1) {
                $isCarused = true;
                break;
            }
        }
        return $isCarused;
    } 

    public static function hasValidCar($id) {
        $validCar = Car::all()->where('user_id',$id)->where('status_id', 2)->where('in_use', 1)->count();
        return  $validCar != 0 ? true : false;
    }
}
