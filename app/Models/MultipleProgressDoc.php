<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MultipleProgressDoc extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'multipleprogress_doc';

     protected $fillable = ['file_id','progress_doc','original_progress_doc'];

     public function progress()
    {
        return $this->belongsTo('App\Models\ProjectDocument');
    }

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    // protected $guarded = ['id'];

}
