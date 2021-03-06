<?php

namespace PManager;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','first_name','last_name','city','role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function comments(){
        return $this->morphMany('PManager\Comment','commentable');
    }

    public function role(){
        return $this->belongsTo('PManager\Role');
    }

    public function companies(){
        return $this->hasMany('PManager\Company');
    }
     public function tasks(){
        return $this->belongsToMany('PManager\Task');
    }
    
     public function projects(){
        return $this->belongsToMany('PManager\Project');
    }

}
