<?php

namespace App\Helpers;
use Illuminate\Support\Facades\DB;

use Encore\Admin\Actions\Response;
use Symfony\Component\VarDumper\VarDumper;

/**
 * calculate the distance between two locations using google map api
 */
class DistanceCalculator
{

    public static function getDistance($originLong,$originLat, $destLong, $destLat ) {
        dd(DB::select(DB::raw('
        select ST_Distance_Sphere(
            point(:lonA, :latA),
            point(:lonB, :latB)
        ) * 0.00621371192
    '), [
                'lonA' => $originLong,
                'latA' => $originLat,
                'lonB' => $destLong,
                'latB' => $destLat,
            ]));
        }
}
