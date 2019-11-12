<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    public function donor()
    {
    	return $this->hasMany('App\Donor');
    }

    public function ngo(){
    	return $this->hasMany('App\Models\NGO');
    }

    public function expatriate(){
    	return $this->hasMany('App\Models\Expatriate','project_id');
    }

    public function work_detail(){
    	return $this->hasMany('App\WorkDetail');
    }

    public function documents(){
    	return $this->hasMany('App\Models\Documents');
    }

    public function ministryDocuments(){
    	return $this->hasMany('App\Models\MinistryDocuments');
    }

    public function evaluationReport()
    {
    	return $this->hasMany('App\EvaluationReport');
    }

    public function generalAgreement()
    {
        return $this->belongsTo('App\Models\GeneralAgreement');
    }

    public function ingo(){
        return $this->belongsTo('App\Models\INGO', 'ingo_name');
    }
}
