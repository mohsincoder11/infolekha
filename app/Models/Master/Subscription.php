<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = [
        'plan',
        'amount',
        'user_type',
        'type',
        'days',
        'view_once',
        'status'
    ];

    public function getSubscriptionMonthDetailAttribute(){
        if($this->type=='Days')
        return $this->type.' - '.$this->days. ' '. ($this->view_once=='1' ? '(view once)' : '');
        else
        return $this->type;
    }

    public function getUserNameAttribute(){
        if($this->user_type=='1')
        return 'School/Institute/College';
        else
        return 'Tutor';
    }
}
