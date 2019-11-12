<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalDocs extends Model
{
    protected $table = 'approval_docs';
    protected $fillable = ['id','approval_detail_id','document','original_document'];
}
