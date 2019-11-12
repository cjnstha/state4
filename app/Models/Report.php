<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reports';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['_method','_token'];

     public function project(){
        return $this->belongsTo('App\Project','project_code');
    }


}
