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
        'name', 'schoolyear_start', 'schoolyear_end',
    ];
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
