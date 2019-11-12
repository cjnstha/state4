<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DIP extends Model
{
     protected $table = 'dips';

   	 protected $guarded = ['id','staff','target'];


   	public function activity(){
        return $this->belongsTo('App\Models\Activity','act_type');
    }
}
