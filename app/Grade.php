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
        'code', 'name', 'department_id', 'status',
    ];

    /**
     * Get the grade's department.
     *
     * @param  string  $value
     * @return string
     */
    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function classroom(){
        return $this->hasMany('App\Classroom');
    }
}
