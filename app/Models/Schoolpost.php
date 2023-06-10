<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schoolpost extends Model
{
    use HasFactory;
    protected $table='school_post';
    protected $fillable = [
        'upload_banner',
       
        'year',
    ];
}
