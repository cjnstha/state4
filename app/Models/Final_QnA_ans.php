<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Final_QnA_ans extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'final_qna_answer';
    
    protected $fillable = ['ref_id','qid','answer'];

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    // protected $guarded = ['id'];

}