<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class Authenticate
{
    const ignoreRouteName = ['login', 'auth', 'sms.send'];
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (is_null($request->session()->get('id')) &&
            ! in_array(Route::currentRouteName(), self::ignoreRouteName)){
                return redirect()->route('login');
        }
        
        View::share([
            'id' => $request->session()->get('id'),
            'account' => $request->session()->get('name'),
        ]);
        
        return $next($request);
    }
}
