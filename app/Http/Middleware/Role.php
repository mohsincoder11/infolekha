<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   
        public function handle($request, Closure $next, String $role) {
            if (!Auth::check()) // This isnt necessary, it should be part of your 'auth' middleware
              return redirect()->route('customerLogin');
            $user = Auth::user();
            $roles = explode('|', $role);

            if(in_array($user->role,$roles))
              return $next($request);
              else
        
              return redirect()->route('index');

        }
    }