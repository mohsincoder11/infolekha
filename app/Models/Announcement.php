<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    protected $table="announcements";
    protected $fillable=[
        'city_id',
        'college_id',
        'heading',
        'image',
        'main_content',
        'status',
        'PackageName',
        'OriginalPrice',
        'Discount',
        'MinDays',
        'MaxDays',
        'SelectedDays',
        'TotalAmount',
        'note'
       
    ];

    public function getCollegeDetailsAttribute(){
        return user_school_institute::where('user_id',$this->college_id)->first() ?? null;

    }

}
