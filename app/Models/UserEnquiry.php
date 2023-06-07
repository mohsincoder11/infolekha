<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEnquiry extends Model
{
    use HasFactory;
    protected $table = "user_enquiry";
    protected $fillable = [
        'user_id',
        'college_id',
        'name',
         'email', 
         'message',
         
        ];
}
