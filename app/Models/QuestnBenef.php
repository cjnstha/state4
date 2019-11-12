<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestnBenef extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questionset_benef';
    
    protected $fillable = ['question_set_id','question_set_name','benef_name'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    // protected $guarded = ['id'];

}