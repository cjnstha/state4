<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalDetail extends Model
{
    protected $table = 'import_approval_detail';
    protected $fillable = ['organization_name','goods_detail_name','custom_exemption','vat_exemption','import_approval_exemption','import_approval','bill_currency','bill_amount','new_bill_currency','new_bill_amount','ministry_id','pre_approval_date'];


    public function docs(){
    	return $this->hasMany('App\Models\ApprovalDocs');
    }

    public function assuranceLetter()
    {
    	return $this->hasMany('App\Models\AssuranceLetter');
    }

    public function ministryDocs()
    {
    	return $this->hasMany('App\Models\MinistryApprovalDocs');
    }
}
