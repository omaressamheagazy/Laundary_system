<?php

namespace App\Http\Controllers\Driver;

use App\Helpers\DistanceCalculator;
use Carbon\Carbon;
use App\Models\Order;
use App\Helpers\Location;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Laundry;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('hasValidDocuments');
    }

    public function newRequest() {
        $newRequests = Order::all()->where('status_id', 1);
        return view('Driver.Order.new-request', ['newRequests' => $newRequests]);
    }
    public function requestDetail($id) {

        $userAddress = Order::all()->where('id', $id)->first()->user->addresses->where('default_address',1)->first();
        $userLat = $userAddress->latitude;
        $userLng = $userAddress->longitude;
        $laundries =Laundry::all()->sort(function($first, $second) use ($userLat,$userLng) {
            
            $firstDist =  DistanceCalculator::getRouteDetails($userLat, $userLng, $first->latitude, $first->longitude);
            $secondDist =  DistanceCalculator::getRouteDetails($userLat, $userLng, $second->latitude, $second->longitude);
            if ($firstDist['distance'] == $secondDist['distance']) {
                return 0;
            }
            return ($firstDist['distance'] < $secondDist['distance']) ? -1 : 1;
        });
        foreach ($laundries as $laudnry) {
            echo $laudnry->name . " ";
        }
        exit();
        $order = Order::all()->where('id', $id)->first();
        if(!isset($order)) return redirect()->route('newRequest'); // if user didn't has any order
        return view('Driver.Order.request-detail', ['order' => $order]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
