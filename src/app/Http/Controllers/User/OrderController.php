<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin\Controllers\PackageController;
use App\Models\Package;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class OrderController extends Controller
{
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
        return view("User.Order.order-summary", ['items' => $items]);
    }
    
    public function deleteItem($id) {
        Cart::where('id', $id)->delete();
        return redirect()->route('order-summary');
    }

    public function checkout($price) {
        return view("User.Order.checkout", ['price' => $price ]);
    }

    public function cashPayment(Request $request) {
        $order = new Order;
        $order->user_id = Auth::id();
        $order->total_price = $request->price;
        $cart = cart::all();
        $order->save();
        foreach ($cart as $item) {
            $orderDetail = new OrderDetails();
            $orderDetail->order_id = $order->id;
            $orderDetail->item = $item->packages->name;
            $orderDetail->price = $item->packages->price;
            $orderDetail->save();
        }
        DB::table('carts')->delete();
        echo "success";
    }
    //
}
