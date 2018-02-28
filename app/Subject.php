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
        'subject_code', 'name', 'description'
    ];

    public function staff()
    {
    	return $this->belongsToMany('App\Staff', 'teachers_subjects', 'subject_id', 'staff_id')->withTimestamps();
    }
}