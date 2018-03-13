<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = [
    	'name', 'description', 'grade_id', 'staff_id', 'subject_id', 'status'
    ];
}
