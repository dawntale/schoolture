<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'abbreviation', 'name', 'description', 'department_id',
    ];

    public function staff()
    {
    	return $this->belongsToMany('App\Staff', 'teachers_subjects', 'subject_id', 'staff_id')->withTimestamps();
    }
}