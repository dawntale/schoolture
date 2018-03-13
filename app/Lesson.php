<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = [
    	'name', 'description', 'grade_id', 'staff_id', 'subject_id', 'status'
    ];

    public function grade()
    {
    	return $this->belongsTo('App\Grade');
    }

    public function teacher()
    {
    	return $this->belongsTo('App\Staff', 'staff_id');
    }

    public function subject()
    {
    	return $this->belongsTo('App\Subject');
    }
}
