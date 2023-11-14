<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserFeedbackModel;
use App\Models\school_institute_detail;
use DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
        'note',
        'role',
        'logo',
        'city_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getCollegeReviewAttribute(){
        $reviews=UserFeedbackModel::join('users','users.id','user_feedback.user_id')->where('college_id',$this->user_id)->orderBy('id','desc')
        ->select('user_feedback.*','users.logo')
        ->get();
        return $reviews;
    }

    public function getSchoolDetailAttribute(){
        return school_institute_detail::where('user_id',$this->id)->first();
    }

    public function getTutorDetailAttribute(){
        return tutor_detail::where('user_id',$this->id)->first();
    }

    public function getEntityTypeAttribute(){
        $entity_name=user_school_institute::where('user_id',$this->id)->first('r_entity');
        return $entity_name->r_entity ?? '';

    }

    public function getPermissionsArrayAttribute(){
        $record = DB::table('user_permissions')->where('user_id', $this->id)->first();
       return $record ? json_decode($record->permissions,true) : [];
    }

    // public function UserPermissions(){
    //    return $this->hasOne(UserPermission::class,'user_id','id');
    // }
}
