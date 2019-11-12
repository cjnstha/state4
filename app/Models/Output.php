<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'output';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

}
