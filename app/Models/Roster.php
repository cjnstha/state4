<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roster extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roster';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

    public function activity(){
        return $this->belongsTo('App\Models\Activity','r_type');
    }
    public function project(){
        return $this->belongsTo('App\Project','project');
    }

}
