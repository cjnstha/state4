<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Q_ans extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'q_ans';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];

}
