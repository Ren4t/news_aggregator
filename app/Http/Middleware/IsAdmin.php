<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use function abort;
// php artisan make:middleware IsAdmin 
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->is_admin){
            
            return $next($request);
        }
        abort(404); //позволяет скрыть админку как если нет такого маршрута
    }
    
    //далее создать алиас в Kernel.php
}
