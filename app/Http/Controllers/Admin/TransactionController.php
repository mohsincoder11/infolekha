<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\transaction;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransactionController extends Controller
{
    public function index(Request $request){
        $query=transaction::orderby('id','desc');
        $transactions = $query
        ->when(isset($request['from_date']) && isset($request['to_date']) && $request['from_date']!=null && $request['to_date']!=null, function ($query) use ($request) {
            return $query->whereBetween('created_at', [$request['from_date'], $request['to_date']]);
        })
            ->when(isset($request['type']) && $request['type']!=null, function ($query) use ($request) {
                return $query->where('type', $request['type']);
            })
            ->when(isset($request['transaction_status']) && $request['transaction_status']!=null, function ($query) use ($request) {
                return $query->where('transaction_status', $request['transaction_status']);
            })
            ->get();
        return view('admin.transaction.index',compact('transactions'));
    }

        public function transaction_due(Request $request){
            $today = Carbon::now();
            $expiryDate = $today->addDays(3); // Get the date 3 days from now
            $query=transaction::orderby('id','desc')->whereDate('expiry', '<=', $expiryDate);
            $transactions = $query
                ->when(isset($request['from_date']) && isset($request['to_date']) && $request['from_date']!=null && $request['to_date']!=null, function ($query) use ($request) {
                    return $query->whereBetween('created_at', [$request['from_date'], $request['to_date']]);
                })
                ->when(isset($request['type']) && $request['type']!=null, function ($query) use ($request) {
                    return $query->where('type', $request['type']);
                })
                ->when(isset($request['transaction_status']) && $request['transaction_status']!=null, function ($query) use ($request) {
                    return $query->where('transaction_status', $request['transaction_status']);
                })
                ->get();
            return view('admin.transaction.due',compact('transactions'));
        }
}
