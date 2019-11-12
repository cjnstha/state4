<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SIP extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sips';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

}
