<?php

namespace PManager;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
     protected $fillable = ['name'];

     public function user(){
     	return $this->hasMany('PManager\User');
     }
}
