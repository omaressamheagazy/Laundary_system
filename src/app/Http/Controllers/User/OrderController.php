<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;

use function PHPUnit\Framework\isEmpty;

class OrderController extends Controller
{
    public function index() {
        return view("User.Order.order");
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function choosepackage(Request $request) {
        $package = new Order;
        $package->user_id = $request->id;
        $package->package_name = $request->package_name;
        $package->price = $request->price;
        $package->save();
        return redirect()->route('order')->with('success', 'order add successfully!');
    }

    public function currentorder() {
        return view("User.Order.currentorder");   
    }

    public function viewcurrentorder() {
        $package = Order::where('user_id', Auth::id())
                            ->select('id','package_name', 'price')
                            ->get();
        
        return view('User.Order.Currentorder');
    }
}
