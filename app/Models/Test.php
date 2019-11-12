<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pretest';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

}
