<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_id',
        'price',
        'image_path',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
