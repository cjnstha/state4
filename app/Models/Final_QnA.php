<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Final_QnA extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'final_qna_rel';
    
    protected $fillable = ['ref_id','qid','aid'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    // protected $guarded = ['id'];

}