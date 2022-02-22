<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next, $role)
{
     //dd($role);



    if (!Auth::check()) // I included this check because you have it, but it really should be part of your 'auth' middleware, most likely added as part of a route group.
        return redirect('user.login');

    $user = Auth::user();


    //dd($user);

        // Check if user has the role This check will depend on how your roles are set up
        if(!$user->hasRole($role)){

            return redirect()->route('user.login');
        }


        return $next($request);

}
}
