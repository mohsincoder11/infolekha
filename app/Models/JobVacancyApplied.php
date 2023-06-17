<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancyApplied extends Model
{
    use HasFactory;
    protected $fillable=[
        'college_id',
        'tutor_id',
        'job_id',
        'status'
    ];

    public function getTutorDetailsAttribute(){
        $tutor_details=tutor_detail::where('user_id',$this->tutor_id)->first();
        return $tutor_details;
    }
}
