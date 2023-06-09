<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobVacancy extends Model
{
    use HasFactory;
    protected $table='job_vacancy';
    protected $fillable = [
        'vacancy_type',
        'subject_name',
        'experience_required',
        'skills_required',
        'estimated_package',
        'job_type',
        'post',
        'scope_of_work',
        'college_id',
    ];
}
