<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'goal';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];
 
    public function project(){
        return $this->belongsTo('App\Project','p_code');
    }

    public function projectname(){
        return $this->belongsTo('App\Project','p_code');
    }

}
