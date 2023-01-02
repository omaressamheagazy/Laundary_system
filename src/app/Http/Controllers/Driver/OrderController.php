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

        $sortedLaundries = Laundry::sortByNearestDistance($id);
        $order = Order::all()->where('id', $id)->first();
        if(!isset($order)) return redirect()->route('newRequest'); // if user didn't has any order
        return view('Driver.Order.request-detail', ['order' => $order, 'laundries' => $sortedLaundries]);
    }

    public function viewLaundry($laundryID) {
        $laundry = Laundry::all()->where('id', $laundryID)->first();
        return view('Driver.Order.view-laundry',['laundry' => $laundry]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
}
