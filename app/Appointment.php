<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'schedule_id', 'user_id','doctor_id','notes','queue_number','status',
    ];


}