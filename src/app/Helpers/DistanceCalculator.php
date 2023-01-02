<?php

namespace App\Helpers;

use Encore\Admin\Actions\Response;
use GuzzleHttp\Client;
use Symfony\Component\VarDumper\VarDumper;

/**
 * calculate the distance between two locations using google map api
 */
class DistanceCalculator
{
    private static $isCreatedBefore = false; // make sure that only one object will be created
    private static Client $client;


    /**
     * instantiate client object 
     *
     * @return void
     */
    private static function __staticConstruct() {
        static::$client = new Client();
        static::$isCreatedBefore = true;
    }
    /**
     * 
     *
     * @param string $originLat
     * @param string $originLng
     * @param string $destinationLat
     * @param string $destinationLng
     * @return array return route details, that contains the duration and distance between two location
     */
    public static function getRouteDetails(
        string $originLat,
        string $originLng,
        string $destinationLat,
        string $destinationLng
    ) {
        $origin = $originLat . ',' . $originLng;
        $destination = $destinationLat . ',' . $destinationLng;
        $response = '';
        $statusCode = '';
        $routeDetails = [
            'distance' => '',
            'duration' => ''
        ];
        if(!static::$isCreatedBefore)  
            Self::__staticConstruct();
        $response = static::$client->get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'query' => [
                'origins' => $origin,
                'destinations' => $destination,
                "units" => 'metric ',
                'key' => env('MAP_API'),
            ],
        ]);
        $statusCode =  $response->getStatusCode();
        $response = json_decode($response->getBody(), true);
        if(Self::isResponseValid($statusCode, $response['rows'][0]['elements'][0]['status'], $response['status'])) {
            $routeDetails = [
                'distance' => $response['rows'][0]['elements'][0]['distance']['text'],
                'duration' => $response['rows'][0]['elements'][0]['duration']['text']
            ];
        }
        return $routeDetails;
    }

    public static function isResponseValid($requestStatus, $responseStatus, $searchResultStatus)
    {
        if ($requestStatus == 200 && $responseStatus == 'OK' && $searchResultStatus == 'OK')
            return true;
        return false;
    }

}
