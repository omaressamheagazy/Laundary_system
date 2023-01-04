<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\DistanceCalculator;
use Illuminate\Support\Facades\DB;


class Laundry extends Model
{
    use HasFactory;
    /**
     * 
     *
     * @param  $orderID
     * @return collection sorted laundries
     */
    public static function sortByNearestDistance($orderID)
    {
        $userAddress = Order::where('id', $orderID)->first()->user->addresses->where('default_address', 1)->first();
        $userLocation = $userAddress->address;
        $sorted = Laundry::all();
        // $sortedLaundries =Laundry::all()->sort(function($first, $second) use ($userLocation) {
        //     $firstRoute =  DistanceCalculator::getRouteDetails($userLocation, $first->latitude, $first->longitude);
        //     $secondRoute =  DistanceCalculator::getRouteDetails($userLocation, $second->latitude, $second->longitude);
        //     $first["distance"] =  $firstRoute['distance'] ;
        //     $first["duration"] =  $firstRoute['duration'] ;
        //     $second["distance"] =  $secondRoute['distance'] ;
        //     $second["duration"] =  $secondRoute['duration'] ;
        //     return $firstRoute['value'] <=> $secondRoute['value'];
        // });
        return $sorted;
    }
    public static function getDistance($originLat, $originLong)
    {
        return Laundry::select("*")->selectRaw("ST_Distance_Sphere(
            Point(:long, :lat), 
            Point(longitude, latitude)
        )* 1000 as distance", [
            'long' => $originLong,
            'lat' => $originLat
        ])->orderBy('distance')
            ->get();
    }
}
