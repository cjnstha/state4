<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plan';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];
    public function project(){
        return $this->belongsTo('App\Project');
    }
    // public function implementors(){
    //     return $this->belongsTo('App\Models\NGO','imp');
    // }

    public function activities(){
        return $this->belongsTo('App\Models\Activity','activity');
    }

    
}
