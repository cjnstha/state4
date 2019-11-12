<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\GeneralSetting;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {

       $generalSetting = GeneralSetting::first();
        if(empty($generalSetting)){
            $generalSetting = new GeneralSetting;
            $generalSetting->title = 'Three Hammers';
            $generalSetting->tagline = 'Three Hammers';
            $generalSetting->logo = '';
            $generalSetting->favicon = '';
        }

       View::share ( 'generalSetting', $generalSetting );
    }

    public function EditRequest()
    {
        echo "this is a test";
        exit();
    }
}
