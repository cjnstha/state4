<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IECMaterial extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iecmaterials';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['_method','_token'];

     public function project(){
        return $this->belongsTo('App\Project');
    }


}
