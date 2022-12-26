<?php

namespace App\Http\Controllers\Driver;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Redis\RedisServiceProvider;

class CarController extends Controller
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
    //
    public function index() {
        $cars = Car::all()->where('user_id',Auth::id());
        return view('Driver.Car.car',['cars' =>$cars]);
    }
    public function add() {
        return view('Driver.Car.addCar');
    }
    public function store(Request $request) {
        $this->validate($request, [
            'carName' => 'required',
            'model' => 'required',
            'plate' => 'required|alpha_num|max:10',
            'color' => 'required',
            'licence' => 'required|mimes:jpeg,png|max:50000',
            'certificate' => 'required|mimes:jpeg,png|max:50000',

        ]);
        
        $licenceImage = $request->file("licence");
        $licenceImageName = date('YmdHi').$licenceImage->getClientOriginalName();

        $certificateImage = $request->file("certificate");
        $certificateImageName = uniqid(true).$certificateImage->getClientOriginalName();

        $licenceImage-> move(public_path('uploads/images'), $licenceImageName);
        $certificateImage-> move(public_path('uploads/images/'), $certificateImageName);

        $car = new Car;
        $car->name = $request->carName;
        $car->user_id = Auth::id();
        $car->model = $request->model;
        $car->color = $request->color;
        $car->plate_number = $request->plate;
        $car->vehicle_certificate = $certificateImageName;
        $car->licence = $licenceImageName;
        $car->status = 'In review';
        $car->save();
        return redirect()->route('cars')->with('success', 'your request has been sent successfully!');
    }

    public function delete($id) {
        Car::where('id', $id)->delete();
        return redirect()->route('cars')->with('success', 'car deleted successfully!');
    }
}
