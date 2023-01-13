<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'payable_id',
        'payable_type',
        'price',
        'amount_paid',
        'discount',
        'mode',
        'rzp_payment_id',
        'payment_details',
        'status',
    ];
}
