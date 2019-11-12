<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    protected $table = 'donor';

    protected $fillable = ['id','project_id','name','address','country','contact','email'];
}
