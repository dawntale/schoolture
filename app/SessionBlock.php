<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SessionBlock extends Model
{
    protected $table = 'session_blocks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'grade_id', 'start_time', 'end_time', 'isBreak',
    ];

    public function schedule()
    {
        return $this->hasMany('App\Schedule', 'session_block_id');
    }

    /**
     * Get the schedule's full time.
     *
     * @param  string  $value
     * @return string
     */
    public function getTimesAttribute()
    {
        return "{$this->start_time} - {$this->end_time}";
    }
}
