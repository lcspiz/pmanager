<?php

namespace PManager;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = ['name','description','company_id','user_id','days'];

     public function user(){
     	return $this->belongsToMany('PManager\User');
     }

     public function company(){
     	return $this->belongsTo('PManager\Company');
     }

     public function comments(){
     	return $this->morphMany('PManager\Comment','commentable');
     }

}
