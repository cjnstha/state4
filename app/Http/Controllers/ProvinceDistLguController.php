<?php

namespace App\Http\Controllers;

use App\Models\MiscDistrict;
use App\Models\MiscLgu;
use Illuminate\Http\Request;

class ProvinceDistLguController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get list of districts from provinces.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMiscDistricts(Request $request)
    {   
        $data['stat'] = 'error';
        $data['data'] = [];
        $districts = MiscDistrict::where(function ($query) use($request) {
                $array = explode(',', $request->province);
                foreach ($array as $key => $value) {
                    $query->orwhere('province_id', $value);
                }
            })->pluck('name', 'id');
        if (count($districts) > 0) {
            $data['stat'] = 'success';
            $data['data'] = $districts;
        }
        return $data;
    }

    /**
     * Get list of lgus from getMiscLgus.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMiscLgus(Request $request)
    {   
        $data['stat'] = 'error';
        $data['data'] = [];
        $lgus = MiscLgu::where(function ($query) use($request) {
                $array = explode(',', $request->district);
                foreach ($array as $key => $value) {
                    $query->orwhere('district_id', $value);
                }
            })->pluck('name', 'id');
        if (count($lgus) > 0) {
            $data['stat'] = 'success';
            $data['data'] = $lgus;
        }
        return $data;
    }

    
}
