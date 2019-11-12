<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benef_Identity_Group extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'benef_identity_if_group';
    
    protected $fillable = ['benef_id','identity_id','identity_value'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    // protected $guarded = ['id'];

}