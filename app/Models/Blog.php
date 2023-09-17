<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table="blogs";
    protected $fillable=[
        'subject',
        'category',
        'user_id',
        'blog_image',
        'content1',
        'content2',
        'content3',
        'content4',
        'status',
        'reject_reason'
];

public function getAuthorNameAttribute(){
    return User::find($this->user_id)->name ?? '';
}

}
