<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    protected $cascadeDeletes = ['tickets'];

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

    public function payable()
    {
        return $this->morphTo();
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
