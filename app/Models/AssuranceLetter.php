<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AssuranceLetter extends Model
{
    protected $table    = 'assurance_letter';
    protected $fillable = ['approval_detail_id','document','orignal_document'];
}
