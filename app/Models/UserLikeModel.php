<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLikeModel extends Model
{
    
    use HasFactory;
    protected $table='user_likes';
    protected $fillable=[
        'user_id',
        'college_id',
    ];
}
