<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaRecommendation extends Model
{
    protected $table = 'visa_recommendation';

    protected $fillable = ['general_agreement_id','project_id','exp_name','person_name','relation','recco_from','recco_to','sw_date','hm_date','visa_date','ingo_id'];

    public function project()
    {
    	return $this->belongsTo('App\Project');
    }

    public function generalAgreement()
    {
    	return $this->belongsTo('App\Models\GeneralAgreement');
    }

    public function expatriate()
    {
    	return $this->belongsTo('App\Models\Expatriate','exp_name');
    }
}
