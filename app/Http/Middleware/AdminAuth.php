<?php

namespace App\Http\Middleware;

use App\Models\UserPermission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuth
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
        $admin=Auth::guard('admin')->user();
        if ($admin && ($admin->role==0 || $admin->role==4)) {
            if($admin->role==4){
                if(can_access_route()){
                return $next($request);
                }
                elseif(can_access_filtered_route('check')){
                    return redirect()->route(can_access_filtered_route('route_name'));
                }
                else{
                    return redirect()->route('admin.login')->with(['error'=>'You dont have permission to access this url']);
                }
            }
            return $next($request);
        } else {
            return redirect()->route('admin.login');
        }
    }
}
