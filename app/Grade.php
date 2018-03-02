<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'schoolyear_start', 'schoolyear_end', 'department_id',
    ];

    /**
     * Get the grade's department.
     *
     * @param  string  $value
     * @return string
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

    public function classroom(){
        return $this->hasMany('App\Classroom', 'grade_id', 'id');
    }

    /**
     * Get the grade's school year.
     *
     * @param  string  $value
     * @return string
     */
    public function getSchoolyearAttribute()
    {
        return "{$this->schoolyear_start}/{$this->schoolyear_end}";
    }
}
