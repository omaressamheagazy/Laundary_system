<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\FunctionNode;
use App\Enums\OrderStatus;

use function PHPUnit\Framework\isEmpty;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isNormalUser');

    }
    public function index()
    {   
        $address = Address::where('user_id', Auth::id())
                            ->select('id','phone', 'address','default_address')
                            ->get();
        
        return view('User.Address.address', ['addresses' => $address]);
    }
    public function add() {
        return view("User.Address.addAddress");
    }
    public function store(Request $request)
    {
        // Validate the request...
        $this->validate($request, [
            'phone' => 'required|numeric|digits:10',
            'address' => 'required',
            'long' => 'required',
            'lat' => 'required',
        ]);
        $address = new Address;
        $address->phone = $request->phone;
        $address->user_id = $request->id;
        $address->address = $request->address;
        $address->latitude = $request->lat;
        $address->longitude = $request->long;

        $address->default_address = $request->switchAddress;
        if($request->switchAddress == 1)
                Address::deactivateOtherAddresses(Auth::id());
        $address->save();
        return redirect()->route('address')->with('success', 'address created successfully!');
    }
    public function delete($id) {
        Address::where('id', $id)->delete();
        return redirect()->route('address')->with('success', 'address deleted successfully!');
    }
    public function edit(Request $request, $id) {
        $address = Address::find($id);
        if(!isset($address)) return redirect()->route('address');
        if ($request->isMethod('post')) {
            $address->phone = $request->phone;
            $address->address = $request->address;
            $address->default_address = $request->switchAddress;
            if($request->switchAddress == 1)
                Address::deactivateOtherAddresses(Auth::id(), $id);
            $address->save();
            return redirect()->route('address')->with('success', 'address updated successfully!');
        }
        return view('User.Address.editAddress', ['address' => $address]);
    }
    //
}
