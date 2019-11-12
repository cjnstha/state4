<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MinistryApprovalDocs extends Model
{
    protected $table    = 'ministry_approval_docs';
    protected $fillable = ['approval_detail_id','document','orignal_document'];
}
