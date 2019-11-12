<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benef_Caste_Group extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'benef_caste_eth_if_group';
    
    protected $fillable = ['benef_id','caste_eth_id','cast_eth_value'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    // protected $guarded = ['id'];

}