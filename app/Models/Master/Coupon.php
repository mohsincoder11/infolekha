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

    public function getCouponForAttribute($value)
    {
        return $value=='1' ? 'School /Institute /College' : 'Tutor';
    }
}
