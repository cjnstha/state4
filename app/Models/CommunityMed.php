<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommunityMed extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'community_med';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['_token'];

    public function benef_names(){
        return $this->belongsTo('App\Models\Benef', 'id','name');
    }
    public function castes(){
        return $this->belongsTo('App\Models\Caste','caste');
    }
}
