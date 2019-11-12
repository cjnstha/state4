<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sgrant extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sgrant';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id','benef_name'];



}
