<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CountryDirector extends Model
{
    protected $table = 'country_director';

    protected $fillable = ['id','general_agreement_id','name','duration_from','duration_to','family_number'];

    public function generalagreement()
    {
    	return $this->hasOne('App\Models\GeneralAgreement');
    }
}
