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
        'job_vacancy_id',
        'status'
    ];

    public function getTutorDetailsAttribute(){
        $tutor_details=tutor_detail::where('user_id',$this->tutor_id)->first();
        return $tutor_details;
    }

    public function getCollegeDetailsAttribute(){
        $college_details=user_school_institute::where('user_id',$this->college_id)->first();
        return $college_details;
    }
    public function getJobVacancyDetailsAttribute(){
        $job_details=JobVacancy::where('id',$this->job_vacancy_id)->first();
        return $job_details;
    }
}
