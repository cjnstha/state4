<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'answers';

     protected $fillable = ['qid','answer'];

     public function quest()
    {
        return $this->belongsTo('App\Models\QnA', 'qid');
    }

    // function persona() {
    //     return $this->belongsTo('Persona', 'idPersona');
    // }

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    // protected $guarded = ['id'];

}
