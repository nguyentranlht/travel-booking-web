<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{   
    protected $table = 'tours';

    protected $fillable = [
        'title',
        'user_id',
        'description',
        'destinations',
        'images',
        'number_of_days',
        'start_time',
        'end_time',
        'schedule',
        'number_of_guests',
        'status',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
