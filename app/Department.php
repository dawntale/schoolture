<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
    	'code', 'name', 'description', 'status',
    ];

    /**
     * Get the department's grade.
     *
     * @param  string  $value
     * @return string
     */
    public function grade()
    {
        return $this->hasMany('App\Grade', 'department_code', 'code');
    }
}
