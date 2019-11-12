<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProStat extends Model
{
     protected $table = 'projectstatus';

     protected $guarded =['_token[]'];
     // protected $fillable = [	 
        
					// 	'act_code',
					// 	'name',	    
					// 	'act_type',	    
					// 	'act_others',    
					// 	'out_put',	    
					// 	'planned_date',	    
					// 	'pb_type',	    
					// 	'pb_travel',	    
					// 	'pb_accom',	    
					// 	'pb_program',	    
					// 	'pb_total',	    
					// 	'i_partners',	    
					// 	'unitQ',	    
					// 	't_target',	    
					// 	'comp_before',	    
					// 	'target_yr',	    
					// 	'remaining',	    
					// 	'n_act',	   

					// 	];

	// public function activity(){
 //        return $this->belongsTo('App\Models\Activity','act_type');
 //    }
}
