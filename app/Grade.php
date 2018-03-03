<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Grade extends Model
{
    protected $table = 'grades';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'name', 'schoolyear_start', 'schoolyear_end', 'department_code', 'status',
    ];

    /**
     * Get the grade's department.
     *
     * @param  string  $value
     * @return string
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'department_code', 'code');
    }

    public function classroom(){
        return $this->hasMany('App\Classroom', 'grade_id', 'id');
    }

    /**
     * Get the grade's academic year.
     *
     * @param  string  $value
     * @return string
     */
    public function getSchoolyearAttribute()
    {
        $school_start = Carbon::parse($this->schoolyear_start);
        $school_start_year = $school_start->year;

        $school_end = Carbon::parse($this->schoolyear_end);
        $school_end_year = $school_end->year;

        return "{$school_start_year}/{$school_end_year}";
    }
}
