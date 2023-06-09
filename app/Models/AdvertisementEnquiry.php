<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementEnquiry extends Model
{
    use HasFactory;
    protected $primaryKey = 'EnquiryID';
    protected $fillable = [
        'PackageID',
        'college_id',
        'PackageName',
        'location',
        'BannerWidth',
        'BannerHeight',
        'OriginalPrice',
        'Discount',
        'MinDays',
        'MaxDays',
        'SelectedDays',
        'CouponCode',
        'TotalAmount',
        'status',
        'image',
    ];

    public function getCollegeDetailsAttribute(){
        return user_school_institute::where('user_id',$this->college_id)->first();

    }
}
