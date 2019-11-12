<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benef extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'benef';

    protected $guarded = ['id','_token','identity_group','caste_eth_group'];
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    // protected $guarded = ['id'];

    public function activity(){
        return $this->belongsTo('App\Models\Activity','act_type');
    }
    public function project(){
        return $this->belongsTo('App\Project','donor_code');
    }
    public function castes(){
        return $this->belongsTo('App\Models\Caste','caste');
    }
    public function identities(){
        return $this->belongsTo('App\Models\Identity','identity');
    }

}
