<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnouncementPackage extends Model
{
    use HasFactory;
    protected $primaryKey = 'PackageID';

    protected $fillable=[
        'PackageName',
        'OriginalPrice',
        'Discount',
         'MinDays',
        'MaxDays',
    ];
}


