<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'grade_id', 'homeroom_teacher',
    ];

    /**
     * Get the classroom's grade.
     *
     * @param  string  $value
     * @return string
     */
    public function grade()
    {
    	return $this->belongsTo('App\Grade', 'grade_id');
    }

    /**
     * Get the classroom's homeroom teacher.
     *
     * @param  string  $value
     * @return string
     */
    public function homeroomTeacher()
    {
    	return $this->hasOne('App\Staff', 'id', 'homeroom_teacher');
    }
}
