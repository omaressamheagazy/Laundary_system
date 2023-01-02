<?php

namespace App\Http\Controllers\Driver;

use App\Enums\OrderStatus as EnumsOrderStatus;
use App\Helpers\DistanceCalculator;
use Carbon\Carbon;
use App\Models\Order;
use App\Helpers\Location;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Laundry;
use App\Models\User;
use App\Enums\OrderStatus as oStatus;
use App\Models\tracker;
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
        $newRequests = Order::all()->where('status_id', oStatus::SEARCHING_FOR_DRIVER->value );
        return view('Driver.Order.new-request', ['newRequests' => $newRequests]);
    }
    public function currentOrder() {
        $currentRequests = Order::all()->where('status_id', '!=' ,oStatus::COMPLETED->value )->where('status_id', '!=' ,oStatus::SEARCHING_FOR_DRIVER->value ) ;
        return view('Driver.Order.current-order', ['currentRequests' => $currentRequests]);
    }
    public function requestDetail($id) {
        $sortedLaundries = Laundry::sortByNearestDistance($id);
        $order = Order::all()->where('id', $id)->first();
        if(!isset($order)) return redirect()->route('newRequest'); // if user didn't has any order
        return view('Driver.Order.request-detail', ['order' => $order, 'laundries' => $sortedLaundries]);
    }

    public function viewCurrentOrder($id) {
        $sortedLaundries = Laundry::sortByNearestDistance($id);
        $order = Order::all()->where('id', $id)->first();
        if(!isset($order)) return redirect()->route('newRequest'); // if user didn't has any order
        return view('Driver.Order.track-order', ['order' => $order, 'laundries' => $sortedLaundries]);
     
    }
    public function trackOrder(Request $request) {
        $sortedLaundries = Laundry::sortByNearestDistance($request->id);
        $order = Order::all()->where('id', $request->id)->first();
        if(!isset($order)) return redirect()->route('newRequest'); // if user didn't has any order
        $tracker = new tracker();
        $tracker->order_id = $request->id;
        $tracker->driver_id = Auth::id();
        $tracker->save();
        Order::changeOrderStatus($request->id, oStatus::DRIVER_ASSIGNED->value);
        return view('Driver.Order.track-order', ['order' => $order, 'laundries' => $sortedLaundries]);
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
