<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'states';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

}
