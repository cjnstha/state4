<?php

namespace App\Http\Controllers;

use App\Project;
use App\Models\Districts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['districts']      = Districts::pluck('district_name','id');
        $data['donor_codes']    = Project::pluck('donor_code','donor_code');
        $data['project_codes']  = Project::pluck('project_code','project_code');

        // $data['current_year']   = date('Y');
      
        $data['projects']       = Project::all();

         return view('project.index', $data);
    }

    public function register()
    {
       return redirect('login')->withFlashSuccess('Sorry! Registration is disabled.');
    }
}
