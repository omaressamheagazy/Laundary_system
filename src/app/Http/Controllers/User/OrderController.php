<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Admin\Controllers\PackageController;
use App\Models\Package;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $packages = Package::all() ?? [];
        return view("User.Order.order", ['packages' => $packages]);
    }
    //
}
