<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Admin\Controllers\PackageController;
use App\Models\Package;
use App\Models\Cart;
use Illuminate\Http\Request;


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
    //
}
