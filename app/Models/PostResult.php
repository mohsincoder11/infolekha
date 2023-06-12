<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostResult extends Model
{
    use HasFactory;
    protected $fillable=[
        'college_id',
        'file',
        'start_year',
        'end_year'
    ];
}
