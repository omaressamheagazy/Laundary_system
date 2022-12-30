<?php

namespace App\Http\Middleware;

use App\Models\Car;
use App\Models\License;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class hasValidDocuments
{
    /**
     * Handle an incoming request.
     * This is to ensure that a driver is ready and allowed to pickup the order
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   
        if(License::hasValidLicense(Auth::id()) && Car::hasValidCar(Auth::id())) {
            // $validDate = today()
            return $next($request);
        }
        else 
            return redirect()->route('driverHome')->with('error', 'you have to make sure that you have valid license and car in use');
    }
}
