<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expatriate extends Model
{
    protected $table = 'expartiate';

    protected $fillable = ['id','project_id','name','designation','from_month','from_year','to_month','to_year','dependant_no'];
}
