<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\user_school_institute;

class UserLikeModel extends Model
{
    
    use HasFactory;
    protected $table='user_likes';
    protected $fillable=[
        'user_id',
        'college_id',
    ];

    public function getCollegeNameAttribute(){
        $name=user_school_institute::where('user_id',$this->college_id)->first('r_name');
        return $name->r_name ?? '';
    }
}
