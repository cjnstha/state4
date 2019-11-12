<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotelab extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quotelab';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['_method','_token'];

     public function project(){
        return $this->belongsTo('App\Project','project_code');
    }
    public function benef(){
        return $this->belongsTo('App\Models\Benef', 'beneficiar');
    }
    public function activityname(){
        return $this->belongsTo('App\Models\Activity','activity');
    }

}
