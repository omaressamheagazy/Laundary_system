<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $laundries = [
            [
                'name' => 'Jef Laundry',
                'image' => 'https://images.unsplash.com/photo-1517677208171-0bc6725a3e60?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s'
            ],
            [
                'name' => 'Unt Laundry',
                'image' => 'https://images.unsplash.com/photo-1567113463300-102a7eb3cb26?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'description' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using '
            ],
            [
                'name' => 'Elit Laundry',
                'image' => 'https://images.unsplash.com/photo-1630329273801-8f629dba0a72?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80',
                'description' => 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC,.'
            ]
        ];
        return view("User.Order.order",compact("laundries"));
    }
    
    public function choosepackage(Request $request) {
        $user = User::find($request->id);
            if(!isset($user)) return redirect()->route('home');
            if ($request->isMethod('post')) {
                $user->package_name = $request->package_name;
                $user->price = $request->price;
                $user->save();
            }
            return view("User.Order.order");
    }
}
