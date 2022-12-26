<?php

namespace App\Http\Middleware;

use App\Models\Address;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Any;
use Symfony\Component\VarDumper\VarDumper;

use function PHPUnit\Framework\isEmpty;

class hasAddress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // echo Auth::id();
        if(Address::all()->where('user_id', Auth::id())->first() == NULL)  // means user doesn't has any address
            return redirect()->route('addAddress')->with('error', 'you have put your address first before proceeding with your order');
            
        return $next($request);
    }
}
