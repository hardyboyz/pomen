<?php

namespace App\Http\Middleware;
use \Illuminate\Http\Request;
use Closure;
use Auth;
use Redirect;

class PreventLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $blockEmail = ['test@pomenapp.com','test2@pomenapp.com','test3@pomenapp.com'];

        if(in_array(auth()->user()->email,$blockEmail)){
            Auth::Logout();
            //return response()->json('Sorry, your email cannot be used at the moment');
            Redirect::back()->withErrors(['msg', 'Sorry your email cannot be used at the moment.']);
        }
        return $next($request);        
        //
    }
}