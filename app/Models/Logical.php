<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logical extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'logical';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

        public function goalname(){
        return $this->belongsTo('App\Models\Goal','goal');
    }

}
