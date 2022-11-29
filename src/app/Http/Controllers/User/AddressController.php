<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('User.address');
    }
    public function store(Request $request)
    {
        // Validate the request...
        $address = new Address;
        $address->phone = $request->phone;
        $address->user_id = $request->id;
        $address->logitude = $request->lng;
        $address->latitude = $request->lat;
        $address->save();
    }
    //
}
