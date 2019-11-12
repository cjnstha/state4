<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'trainings';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id','benef_name'];
    public function castes(){
        return $this->belongsTo('App\Models\Caste','caste');
    }
}
