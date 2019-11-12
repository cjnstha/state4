<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class INGO extends Model
{
    protected $table = 'ingo';

    protected $fillable = ['id','name','country','address','contact_no','contact_person','email','staff_number','estd_date','close_date']; 

    public function generalAgreement()
    {
    	return $this->hasMany('App\Models\GeneralAgreement','ingo_id');
    }
}
