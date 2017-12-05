<?php

namespace PManager;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
     protected $fillable = ['name','project_id','user_id','days','hours','company_id'];


     public function project(){
     	return $this->belongsTo('PManager\Project');
     }

     public function company(){
     	return $this->belongsTo('PManager\Company');
     }
     public function user(){
          return $this->belongsTo('PManager\User');
     }

     public function users(){
          return $this->belongsToMany('PManager\User');
     }


     public function comments(){
          return $this->morphMany('PManager\Comment','commentable');
     }

}
