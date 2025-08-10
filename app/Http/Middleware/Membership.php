<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Membership
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
        if($request->user()->is_member == 1){
            return $next($request);
        }else{
            // contact to administrators not authorized
            session()->flash('verificationalerror', 'Your account is not verified yet. Please contact the administrator.');
            Auth::logout();
            return redirect()->route('site.sign_in');
            return response()->view('errors.403', [], 403);
        }
    }
}
