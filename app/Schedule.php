<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
    	'class_id', 'day', 'session_block_id', 'lesson_id',
    ];

    public function time()
    {
    	return $this->hasMany('App\SessionBlock', 'id', 'session_block_id');
    }
}
