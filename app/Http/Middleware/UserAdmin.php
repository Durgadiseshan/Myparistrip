<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class UserAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next)
    {
        if(Auth::user() != null){
            if (Auth::user() && Auth::user()->is_admin) {
                return $next($request);
            }

            return redirect('/login')->with('error', 'Unauthorized');
        }
        return $next($request);
        throw new HttpException(401);
    }
}
