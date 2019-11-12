<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralAgreement extends Model
{
    protected $table   = 'general_agreement';

    protected $guarded = ['id'];

    public function ingo()
    {
    	return $this->belongsTo('App\Models\INGO');
    }

    public function generaltheme()
    {
    	return $this->hasMany('App\Models\GeneralTheme');
    }

    public function countryDirector()
    {
        return $this->hasMany('App\Models\CountryDirector');
    }

    public function generalRenew()
    {
        return $this->hasMany('App\Models\GeneralRenew');
    }

    public function project()
    {
        return $this->hasMany('App\Project');
    }
}
