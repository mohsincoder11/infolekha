<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthCheck
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
        //dd($request->all());
       if($request->has('txnid')){
        $user_id=DB::table('transaction')->where('transaction_id',$request->get('txnid'))->first()->user_id;
        if($user_id){
            $user = User::find($user_id);
            if ($user) {
                Auth::loginUsingId($user->id);
            }
        }else{
            return redirect()->route('index')->with(['error'=>'Please login to access the page.']);
        }

       }

        if (auth()->user()) {
            return $next($request);
        } else {
            return redirect()->route('index')->with(['error'=>'Please login to access the page.']);
        }
    }
}
