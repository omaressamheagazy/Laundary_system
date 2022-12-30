<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin\Controllers\PackageController;
use App\Models\Package;
use App\Models\Cart;
use App\Models\Delivery;
use App\Models\Order;
use App\Models\OrderDetails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class OrderController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isNormalUser');
    }
    public function index() {
        $packages = Package::all() ?? [];
        return view("User.Order.order", ['packages' => $packages]);
    }

    public function addToCart(Request $request) {
        $cart = new Cart;
        $cart->user_id = $request->id;
        $cart->package_id = $request->package_id;
        $cart->save();
        return redirect()->route('order')->with('success', 'package has added to the cart successfully!');

    }
    public static function countCartItems() {
        return Cart::where('user_id', Auth::id())->count();
    }

    public function summary() {
        $items = Cart::all() ?? [];
        if(count($items) == 0) return redirect()->route('order');
        $deliveryTypes = Delivery::all();
        return view("User.Order.order-summary", ['items' => $items, 'deliveryTypes' => $deliveryTypes]);
    }
    
    public function deleteItem($id) {
        Cart::where('id', $id)->delete();
        return redirect()->route('order-summary');
    }

    public function checkout($totalPackagesPrice, Request $request) {
        $deliveryType = Delivery::all()->where('id', $request->deliveryType)->first();
        $totalPrice = $totalPackagesPrice +  $deliveryType['price'];
        return view("User.Order.checkout", ['totalPackagesPrice' => $totalPrice, 'deliveryId' => $deliveryType['id']]);
    }

    public function currentOrder() {
        $orders = Order::where('user_id', Auth::id())
        ->select('id','total_price', 'status_id')
        ->get();
        return view('User.Order.current-order', ['orders' => $orders]);

    }
    public function cashPayment(Request $request) {
        $packagesPrice = 0;
        $order = new Order;
        $order->user_id = Auth::id();
        $order->total_price = $request->totalPackagesPrice;
        $order->delivery_id = $request->deliveryId;
        $cart = cart::where('user_id', Auth::id())
        ->get();
        $order->save();
        $counter = 0;
        foreach ($cart as $item) {
            $orderDetail = new OrderDetails();
            $orderDetail->order_id = $order->id;
            $orderDetail->item = $item->packages->name;
            foreach ($item->packages->services as $service) {
                $packagesPrice += $service->price;
            }
            $orderDetail->price = $packagesPrice;
            $orderDetail->save();
            $counter++;
        }
        DB::table('carts')->where('user_id',Auth::id())->delete();
        return redirect()->route('current-order')->with('success', 'You order has placed successfully!');
        
    //
    }
    public function tracker(Request $request  ,$id) {
        $order = Order::all()->where('id', $id)->first();
        if(!isset($order)) return redirect()->route('current-order'); // if user didn't has any order
        return view('User.Order.track-order', ['order' => $order]);
    }
    public function cancel($id) {
        OrderDetails::where('id', $id)->delete();
        Order::where('id', $id)->delete();
        return redirect()->route('current-order')->with('success', 'Order cancelled successfully!');
    }
}
