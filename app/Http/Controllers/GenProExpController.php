<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Models\Expatriate;

class GenProExpController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function getProjectCode(Request $request)
    {
    	$data['stat'] = 'error';
        $data['data'] = [];
        $project_code = Project::where(function ($query) use($request) {
                $array = explode(',', $request->project);
                foreach ($array as $key => $value) {
                    $query->orwhere('general_agreement_id', $value);
                }
            })->pluck('project_name','id');
        if (count($project_code) > 0) {
            $data['stat'] = 'success';
            $data['data'] = $project_code;
        }
        return $data;
    }

    public function getExpName(Request $request)
    {
    	$data['stat'] = 'error';
        $data['data'] = [];
        $exp_name = Expatriate::where(function ($query) use($request) {
                $array = explode(',', $request->expname);
                foreach ($array as $key => $value) {
                    $query->orwhere('project_id', $value);
                }
            })->pluck('name','id');
        if (count($exp_name) > 0) {
            $data['stat'] = 'success';
            $data['data'] = $exp_name;
        }
        return $data;
    }

     public function getDesignation(Request $request)
    {
    	$data['stat'] = 'error';
        $data['data'] = [];
        $exp_des = Expatriate::where(function ($query) use($request) {
                $array = explode(',', $request->expdes);
                foreach ($array as $key => $value) {
                    $query->orwhere('id','=', $value);
                }
            })->pluck('designation','id');
        if (count($exp_des) > 0) {
            $data['stat'] = 'success';
            $data['data'] = $exp_des;
        }
        return $data;
    }
}
