<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LiveLocation;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function userHome() {
        return view("User.home");
    }
    public function driverHome() {
        return view("Driver.home");
    }
    public function tryAjax(Request $request) {
        // dd($request->value);
        $liveLocation = new LiveLocation();
        $liveLocation->driver_id = $request->driver_id;
        $liveLocation->latitude = $request->latitude;
        $liveLocation->longitude = $request->longitude;
        $liveLocation->save();
    }

}

