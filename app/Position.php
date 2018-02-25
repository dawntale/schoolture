<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{    
    protected $table = 'staff_positions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    
    public function staff(){
        return $this->hasMany('App\Staff', 'position_id', 'id');
    }
}