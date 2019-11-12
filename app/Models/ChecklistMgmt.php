<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistMgmt extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'checklistmgmt';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];
}
