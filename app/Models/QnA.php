<?php

namespace App\Models;
use App\Models\MultipleFile;

use Illuminate\Database\Eloquent\Model;

class QnA extends Model
{
    protected $table = 'questions';

    protected $guarded = ['_method','_token','answers','newadded'];

    public function answers()
    {
        return $this->hasMany('App\Models\Answer','qid');
    }

}
