<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DistanceCalculator;

class Laundry extends Model
{
    use HasFactory;
    /**
     * 
     *
     * @param  $orderID
     * @return collection sorted laundries
     */
    public static function sortByNearestDistance($orderID) {
        $userAddress = Order::all()->where('id', $orderID)->first()->user->addresses->where('default_address',1)->first();
        $userLat = $userAddress->latitude;
        $userLng = $userAddress->longitude;
        $sortedLaundries =Laundry::all()->sort(function($first, $second) use ($userLat,$userLng) {
            $firstRoute =  DistanceCalculator::getRouteDetails($userLat, $userLng, $first->latitude, $first->longitude);
            $secondRoute =  DistanceCalculator::getRouteDetails($userLat, $userLng, $second->latitude, $second->longitude);
            $first["distance"] =  $firstRoute['distance'] ;
            $first["duration"] =  $firstRoute['duration'] ;
            $second["distance"] =  $secondRoute['distance'] ;
            $second["duration"] =  $secondRoute['duration'] ;
            return $firstRoute['value'] <=> $secondRoute['value'];
        });
        return $sortedLaundries;
    }
}
