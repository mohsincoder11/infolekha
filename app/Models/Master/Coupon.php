<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'code',
        'type',
        'discount',
        'status',
        'coupon_for'
    ];

    public function getCouponForNameAttribute()
    {

        switch ($this->coupon_for) {
            case '1':
                $result = 'School';
                break;
            case '2':
                $result = 'Tutor';
                break;
            case '3':
                $result = 'Advertisement';
                break;
            case '4':
                $result = 'Announcement';
                break;
            default:
                $result = 'Unknown';
                break;
        }

        echo $result;

    }
}
