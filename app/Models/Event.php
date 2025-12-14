<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'items'=>'array'
    ];

    protected $dates = ['date'];
    public function user () {
        return $this->belongsTo('App\Models\User');
    }

    protected $fillable = [
        'title',
        'city',
        'private',
        'description',
        'image',
        'date',
        'items',
        'user_id'
    ];
}
