<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrencyMgmt extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'currency_mgmt';
    
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = ['id'];
}
