<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class transaction extends Model
{
    use HasFactory;
    protected $table = "transaction";
    protected $fillable = [
        'name',
        'mob',
        'address',
        'user_id',
        'amount',
        'user_role',
        'transaction_id',
        'transaction_status',
        'type',
        'AnnouncementID',
        'expiry',
        'coupon'
    ];

    public function getEntityNameAttribute()
    {
        $entity = User::where('id', $this->user_id)->first();
        $entity_name = '';
        if (isset($entity)) {
            if ($entity->role == '1') {
                $entity_name = user_school_institute::select('r_entity')->where('user_id', $entity->id)->first()->r_entity;
            } elseif ($entity->role == '2') {
                $entity_name = 'Tutor';
            }
        }
        return $entity_name;
    }

    public function getUserInfoAttribute()
    {
        $user = User::find($this->user_id);
        return $user;

    }


    public function getTransactionSubscriptionAttribute()
    {
        if($this->type=='Subscription'){
            $transaction_Subscription = TransactionSubscription::where('transaction_id',$this->id)->first();
        }else{
            $transaction_Subscription = Announcement::where('id',$this->AnnouncementID)->first();
        }
        return $transaction_Subscription;

    }



    public function getExpiryDifferenceAttribute()
    {
        $differenceInHours = Carbon::now()->endOfDay()->diffInHours(Carbon::parse($this->expiry));
        if (Carbon::parse($this->expiry)->isPast()) {
            $formattedDifference = '<span class="badge  bg-danger ">Expired</span>';
        } else {
            if ($differenceInHours < 24) {
                $formattedDifference = '<span class="badge  bg-warning ">1 day</span>';
            } else {
                $formattedDifference = '<span class="badge  bg-warning ">'.ceil($differenceInHours / 24) . ' days</span>';
            }
        }
    
        return $formattedDifference;
    }
}
