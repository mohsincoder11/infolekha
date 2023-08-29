<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionSubscription extends Model
{
    use HasFactory;
    protected $fillable = ['plan', 'amount', 'type', 'transaction_id'];

}
