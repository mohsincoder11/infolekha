<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertisementPackage extends Model
{
    use HasFactory;
    protected $primaryKey = 'PackageID';
    protected $fillable = [
        'PackageName',
        'location',
        'BannerWidth',
        'BannerHeight',
        'OriginalPrice',
        'Discount',
        'MinDays',
        'MaxDays',
    ];
}
