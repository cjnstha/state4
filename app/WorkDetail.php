<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkDetail extends Model
{
    protected $table = 'work_details';

    protected $fillable = ['id','project_id','ngo','province_id','district_id','lgu_id','ward','activity','w_detail','unit','unit_cost','total_cost','activity_main'];

    public function projectAgreement(){
    	return $this->belongsTo('App\Project', 'project_id');
    }

    public function activityMain(){
    	return $this->belongsTo('App\Models\Activity', 'activity_main');
    }

    
}
