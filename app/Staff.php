<?php

namespace App;

use App\Notifications\StaffResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'staffs';
    
    protected $guard = 'staff';
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'position_id' => 'integer',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'staff_id', 'first_name', 'last_name', 'email', 'password', 'position_id', 'birthdate'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function position()
    {
        return $this->belongsTo('App\Position', 'position_id', 'id');
    }

    public function subject()
    {
        return $this->belongsToMany('App\Subject', 'teachers_subjects', 'staff_id', 'subject_id')->withTimestamps();
    }
    
    /**
     * Get the staff's full name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new StaffResetPasswordNotification($token));
    }
}
