<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaDateRange extends Model
{
    protected $table = 'visa_date_range';

    protected $fillable = ['visa_id','name','position','date_from','date_to','dependent_name','relationship'];
}
