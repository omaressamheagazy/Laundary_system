<?php

namespace App\Helpers;

use Encore\Admin\Actions\Response;
use GuzzleHttp\Client;
use Symfony\Component\VarDumper\VarDumper;
/**
 * Helper function is used to calculate the distance between two points using Distance matrix API
 *
 */ 
class DistanceCalculator
{
    private $response;
    private int $statusCode;
    public function __construct(
        string $originLat,
        string $originLng,
        string $destinationLat,
        string $destinationLng
    ) {
        $client = new Client();
        $origin = $originLat . ',' . $originLng;
        $destination = $destinationLat . ',' . $destinationLng;
        $this->response = $client->get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'query' => [
                'origins' => $origin,
                'destinations' => $destination,
                "units" => 'metric ',
                'key' => env('MAP_API'),
            ],
        ]);
        $this->statusCode =  $this->response->getStatusCode();
        $this->response = json_decode($this->response->getBody(), true);
    }
    public function isResponseValid()
    {
        if ($this->statusCode == 200 && $this->response['rows'][0]['elements'][0]['status'] == 'OK' && $this->response['status'] == 'OK')
            return true;
        return false;
    }
    public function getDistance()
    {
        if($this->isResponseValid())
            return $this->response['rows'][0]['elements'][0]['distance']['text'];
    }
    public function getDuration()
    {
        if($this->isResponseValid())
            return $this->response['rows'][0]['elements'][0]['duration']['text'];
    }
}
