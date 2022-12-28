<?php

namespace App\Http\Controllers\Driver;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\License;

class LicenseController extends Controller
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
    public function index() {
        $licenses = License::all()->where('user_id',Auth::id());
        return view('Driver.License.license',['licenses' =>$licenses]);
    }
    public function add() {
        return view('Driver.License.addLicense');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'date' => 'required|date_format:Y-m-d|after:today',
            'licence' => 'required|mimes:jpeg,png|max:50000',

        ]);
        
        $licenceImage = $request->file("licence");
        $licenceImageName = date('mdYHis') . uniqid().$licenceImage->getClientOriginalName();


        $licenceImage-> move(public_path('uploads/images'), $licenceImageName);

        $license = new License;
        $license->licence = 'images/' . $licenceImageName;
        $license->end_date = $request->date;
        $license->user_id = Auth::id();
        $license->status_id = 1;
        $license->save();
        return redirect()->route('licenses')->with('success', 'your request has been sent successfully!');
    }
    
    public function delete($id) {
        License::where('id', $id)->delete();
        return redirect()->route('licenses')->with('success', 'license deleted successfully!');
    }
}
