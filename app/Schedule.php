<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
    	'class_id', 'day', 'session_block_id', 'subject_id', 'staff_id',
    ];

    public function subject()
    {
    	return $this->hasMany('App\Subject', 'id', 'subject_id');
    }

    public function staff()
    {
    	return $this->hasOne('App\Staff', 'id');
    }

    public function time()
    {
    	return $this->hasMany('App\SessionBlock', 'id', 'session_block_id');
    }
}
