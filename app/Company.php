<?php

namespace PManager;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
     protected $fillable = ['name','description','user_id'];

     public function user(){
     	return $this->belongsTo('PManager\User');
     }     

     public function projects(){
     	return $this->hasMany('PManager\Project');
     }

     public function comments(){
     	return $this->morphMany('PManager\Comment','commentable');
     }
}
