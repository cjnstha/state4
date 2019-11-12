<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralRenew extends Model
{
    protected $table    = 'general_agreement_renew';

    protected $fillable = ['id','general_agreement_id','year','month','date_of_renew'];
}
