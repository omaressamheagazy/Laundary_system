<?php

namespace App\Http\Controllers\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isNormalUser');

    }
    public function index() {
        return view("User.profile");
    }
    public function edit(Request $request) {
        // Validate the request...
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
            $user = User::find($request->id);
            if(!isset($user)) return redirect()->route('home');
            if ($request->isMethod('post')) {
                $user->name = $request->name;
                $user->email = $request->email;
                if($user->email != Auth::user()->email) 
                    $user->email_verified_at = NULL;
                $user->save();
                return redirect()->route('home')->with('success', 'profile updated successfully!');
            }
        return view('User.profile');
    }
}
